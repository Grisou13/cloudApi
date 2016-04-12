Better file system
https://cartalyst.com/manual/filesystem/3.0

AUTH WITH FLUX
https://auth0.com/blog/2015/04/09/adding-authentication-to-your-react-flux-app/

Repositories :
 - https://github.com/Bosnadev/Repositories
 - https://github.com/andersao/l5-repository
 https://bosnadev.com/2015/03/07/using-repository-pattern-in-laravel-5/#Package_Installation

Modification of Dingo/blueprint
- Create an automatic CURL example for every action Action.php, Blueprint.php, Example.php
 - All actions must create an example if there is a request


TODO:
- Create a better file abstraction
- Finalize serving of the documentation
- User GUI interface with flux
- Finish Flux filebrowser (basique)
- Create api documentation
  - Finish docstrings
  - Create CURL examples
  - Create a TOC
- Create CRUD operations for Calendars
- Remake update statements for all resources to take the request payload, and merge it with the asked resource ( $resource->update(array_merge($resource->toArray(),$payload))