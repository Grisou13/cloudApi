<?php
/**
 * Created by PhpStorm.
 * User: thomas.ricci
 * Date: 10.03.2016
 * Time: 14:05
 */

namespace App\Api\Repositories;


use App\User;
use Config;
use Dingo\Api\Auth\Auth;
use Illuminate\Contracts\Filesystem\Filesystem;

use Illuminate\Support\Str;
use Storage;
use File;

/**
 * This repository handles user specific files.
 * @property  base_path
 */
class FileRepository implements Filesystem
{
    /**
     * @var null|User
     */
    protected $user = null;

    /**
     * @var \Illuminate\Contracts\Filesystem\Filesystem
     */
    protected $storage;
    /**
     * 
     * @var string
     */
    protected $root = "/app/user_data/";

    /**
     * FileRepository constructor.
     * @param User|null $user
     */
    public function __construct()
    {
        $this->storage = $this->getStorage();
    }
    public function create($data)
    {
        
    }
    public static function instanceForAuthenticatedUser()
    {
        return self::instanceForUser(app(Auth::class)->user());
    }
    public static function instanceForUser($user)
    {
      $self = new static();

      $self->setUser($user);
      return $self;
    }

    /**
     * @param $path
     * @param $user
     * @return string
     */
    public static function buildPathForUser($path,$user)
    {
        /** @var FileRepository $self */
        $self = self::instanceForUser($user);
        $self->setUser($user);
        return $self->buildPath($path);
    }
    /**
     * @return User|null
     * @throws \Exception
     */
/*    public function user()
    {
        $user = $this->user;
        try{
            if($user == null){
                $user = ;
                $this->user = $user;
            }
        }catch(\Exception $e){
            throw new \Exception("Failed to get user data : ".print_r($this->user,true));
        }
        return $user;
    }*/

    /**
     * Helper to construct the path for a file. /some/file, will be in storage /app/user_data/id_{userid}/some/file
     * If the path that is passed already exists somewhere in the storage, it will just return it
     * @param $path
     * @param string $storage
     * @return string
     */
    public function buildPath($path,$storage = "local")
    {
        $path = str_replace("\\","/",$path);
        //die(var_dump($this->user));
        if(!Str::startsWith($path,"/") && !Str::startsWith($path,"./"))
            $path = "/".$path;

        switch($storage)//$storage = true means we want some sort of app defined storage, otherwise, we just return the path
        {
            case "dropbox":
                return $path;
                break;
            default:
                if(file_exists($path))//an absolute path
                    return $path;
                if(file_exists(storage_path($path)))//maybe something in storage?
                    //return storage_path($path);
                    return $path;

                return $this->getBasePath().$path;
                break;
        }
    }
    public function getRoot()
    {
        return $this->root;
      //return storage_path("app/user_data/");
    }
    /**
     * @return string
     */
    public function getBasePath()
    {

        $user = $this->getUser();
        //dd($user->toArray());
        if(!$user)
            return $this->getRoot();
        //var_dump($user);
        return $this->getRoot().$user->getKeyName()."_".$user->getKey();
    }

    /**
     * @param mixed $user
     * @return FileRepository
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @param string $from
     * @param string $to
     * @return bool
     */
    public function copy($from,$to)
    {

        $from = $this->buildPath($from);
        $to = $this->buildPath($to);
        return  $this->getStorage()->copy($from,$to);
    }

    /**
     * @param array|string $paths
     * @return bool
     */
    public function delete($paths)
    {
        $paths = is_array($paths) ? $this->buildPath($paths) : func_get_args();

        foreach ($paths as $path) {
            $this->storage->delete($this->buildPath($path));
        }
        return true;
    }
    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $from
     * @param string $to
     */
    public function move($from,$to)
    {

        $this->getStorage()->move($from,$this->buildPath($to));
    }

    /**
     * @return Filesystem
     */
    public function getStorage()
    {
        //return File;
        //$adaptor = Storage::disk()->getDriver()->getAdapter();
        //$adaptor->setPathPrefix($this->getBasePath());
        //dd($adaptor);
        return Storage::disk();
    }

    /**
     * Determine if a file exists.
     *
     * @param  string $path
     * @return bool
     */
    public function exists($path)
    {
        return $this->storage->exists($this->buildPath($path));
    }

    /**
     * Get the contents of a file.
     *
     * @param  string $path
     * @return string
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function get($path)
    {
        return $this->storage->get($this->buildPath($path));
    }

    /**
     * Write the contents of a file.
     *
     * @param  string $path
     * @param  string|resource $contents
     * @param  string $visibility
     * @return bool
     */
    public function put($path, $contents, $visibility = null)
    {
        return $this->storage->put($this->buildPath($path),$contents,$visibility);
    }

    /**
     * Get the visibility for the given path.
     *
     * @param  string $path
     * @return string
     */
    public function getVisibility($path)
    {
        return $this->storage->getVisibility($this->buildPath($path));
    }

    /**
     * Set the visibility for the given path.
     *
     * @param  string $path
     * @param  string $visibility
     * @return void
     */
    public function setVisibility($path, $visibility)
    {
        $this->storage->setVisibility($this->buildPath($path),$visibility);
    }

    /**
     * Prepend to a file.
     *
     * @param  string $path
     * @param  string $data
     * @return int
     */
    public function prepend($path, $data)
    {
        return $this->storage->prepend($this->buildPath($path),$data);
    }

    /**
     * Append to a file.
     *
     * @param  string $path
     * @param  string $data
     * @return int
     */
    public function append($path, $data)
    {
        return $this->storage->append($this->buildPath($path),$data);
    }

    /**
     * Get the file size of a given file.
     *
     * @param  string $path
     * @return int
     */
    public function size($path)
    {
        return $this->storage->size($this->buildPath($path));
    }

    /**
     * Get the file's last modification time.
     *
     * @param  string $path
     * @return int
     */
    public function lastModified($path)
    {
        return $this->storage->lastModified($this->buildPath($path));
    }

    /**
     * Get an array of all files in a directory.
     *
     * @param  string|null $directory
     * @param  bool $recursive
     * @return array
     */
    public function files($directory = null, $recursive = false)
    {
        return $this->storage->files($this->buildPath($directory),$recursive);
    }

    /**
     * Get all of the files from the given directory (recursive).
     *
     * @param  string|null $directory
     * @return array
     */
    public function allFiles($directory = null)
    {
        return $this->storage->allFiles($this->buildPath($directory));
    }

    /**
     * Get all of the directories within a given directory.
     *
     * @param  string|null $directory
     * @param  bool $recursive
     * @return array
     */
    public function directories($directory = null, $recursive = false)
    {
        return $this->storage->directories($this->buildPath($directory),$recursive);
    }

    /**
     * Get all (recursive) of the directories within a given directory.
     *
     * @param  string|null $directory
     * @return array
     */
    public function allDirectories($directory = null)
    {
        return $this->storage->allDirectories($this->buildPath($directory));
    }

    /**
     * Create a directory.
     *
     * @param  string $path
     * @return bool
     */
    public function makeDirectory($path)
    {
        return $this->storage->makeDirectory($this->buildPath($path));
    }

    /**
     * Recursively delete a directory.
     *
     * @param  string $directory
     * @return bool
     */
    public function deleteDirectory($directory)
    {
        return $this->storage->deleteDirectory($this->buildPath($directory));
    }
}
