# [php_srrJSEncrypt](https://github.com/caos30/php_srrJSEncrypt)

Simple way (unique PHP file) to store your encrypted data in a single text file, not using database at all and encrypting from the client side using javascript AES algorithms.

## Screenshots

![first access window](/screenshot3.png?raw=true "First access window")

![client side encrypted data](/screenshot.png?raw=true "Client side encrypted data")

![decrypted data](/screenshot2.png?raw=true "Decrypted data")


## Start the project

Copy this project in any PHP 5+ server and call it from browser. Default encryption key "1234". Each time you decrypt, you can change key and re-encrypt and save.
You must remember that the encryption key is not saved ANYWHERE, so you must take care by yourself for not forget it!

## Use, improve and share

You're welcome to use it. I use it since long time ago for save all my important private data, hosting a copy of this project on one of my servers.
Please, if you make any improvement, request a pull ;)

## Data files

On the directory `/data` you can put as many data files you need. Then the `index.php` show at home a list of the files included in that directory. The name of those files cannot contain dots or inclined slashes (. / \ ) due to security reasons. It will be recommendable only to use letters, numeric digits and horizontal slashes.

## Credit

Created by [caos30](https://github.com/caos30)
