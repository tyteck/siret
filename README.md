# Siret : Validate

## Description
During one of my project I figured out that no package was available to check if one 
Siret number was valid. This package will do so.

## Installation
If you use composer you can simply run 
```
composer require tyteck/siret
```

## Validation

```
use Tyteck\Siret\Siret;
...
if (Siret::isValid($siretNumber)){
    // your code
}
```


## TODO
* some siret are specific and do not comply with standatd validation
    * la poste
    * siret from monaco
* generate fake siret number for factories
* truly verify if siret is assigned to a company (if possible)