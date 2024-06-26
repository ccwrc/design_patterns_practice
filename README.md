## design_patterns_practice (up to PHP 8.3 version)    

Create your own .env file and copy the contents of .env.dist to it (in the same directory).

## To run unit tests:  
./vendor/bin/phpunit   
or with a detailed description:    
./vendor/bin/phpunit --verbose     

## To run PHPStan:
./vendor/bin/phpstan analyse  ./ --level 4        

## Basic commands for Docker:
docker build -t design_patterns_practice .        
docker run -d -it --name dpp design_patterns_practice         
docker exec -it dpp /bin/sh      
./vendor/bin/phpunit       
## 

**Creational:**   
- Abstract Factory
- Builder
- Prototype
- Singleton
- Property
- Factory method  
- Simple Factory  

**Structural:**   
- Dependency Injection
- Facade    
- Adapter (Wrapper)    
- Composite   
- Fluent Interface   

**Behavioral:**   
- Memento
- Null Object
- Observer
- Strategy (Policy)   
- Visitor   
- Command  
- State    

**Others:**   
- Value Object
- Command Query Separation
- Lazy Loading  
- DTO   :pen: 
