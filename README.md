# Siret : Validate

<div align="center">
    
[![Build Status](https://travis-ci.org/tyteck/siret.svg?branch=master)](https://travis-ci.org/tyteck/siret)

</div>

## Description
Small package to validate siret number.

## Installation
If you use composer you can simply run 
```
composer require tyteck/siret
```

## Usage
```
use Tyteck\Siret\Siret;
...
if (Siret::isValid($siretNumber)){
    // your code
}
```

## Todo
* truly verify if siret is assigned to a company (if possible)
