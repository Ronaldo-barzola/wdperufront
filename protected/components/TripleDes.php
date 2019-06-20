<?php

/**
 * TripleDes es la clase creada para realizar las encriptaciones de claves y otros.
 * 
 * Nos permite encriptar contenido y desencriptando mediante una llave
 * única que es generado por el arquitecto de software.
 *
 * @author Nolberto Vilchez Moreno <jnolbertovm@gmail.com>
 * @package Catastro\Components
 */
class TripleDes {


    public static function Encrypt($data) {
        //Generate a key from a hash
        $key = md5(utf8_encode(Constante::SECRET), true);

        //Take first 8 bytes of $key and append them to the end of $key.
        $key .= substr($key, 0, 8);

        //Pad for PKCS7
        $blockSize = mcrypt_get_block_size('tripledes', 'ecb');
        $len       = strlen($data);
        $pad       = $blockSize - ($len % $blockSize);
        $data .= str_repeat(chr($pad), $pad);

        //Encrypt data
        $encData = mcrypt_encrypt('tripledes', $key, $data, 'ecb');

        return base64_encode($encData);
    }

    public static function Decrypt($data) {

        //Generate a key from a hash
        $key = md5(utf8_encode(Constante::SECRET), true);

        //Take first 8 bytes of $key and append them to the end of $key.
        $key .= substr($key, 0, 8);

        $data = base64_decode($data);

        $data = mcrypt_decrypt('tripledes', $key, $data, 'ecb');

        $block = mcrypt_get_block_size('tripledes', 'ecb');
        $len   = strlen($data);
        $pad   = ord($data[$len - 1]);

        return substr($data, 0, strlen($data) - $pad);
    }

}
