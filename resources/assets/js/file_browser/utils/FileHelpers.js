
module.exports = {

  splitPath(string){
    var ret = [];
    var array;
    array = string.split("/");
    array = array.filter(Boolean);
    array.unshift("/")
    var path="/";
    for(var i = 0; i < array.length; i++)
    {
      var folderName = array[i];
      if(i!==0)
        path += folderName;//just add the foldername if it's no the root
      else
          folderName = "root";
      ret.push({"folderName":folderName,"path":path});
      if(i!==0)
        path += "/";//add a trailing slash
    }
    return ret;
  }
};
