<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), array(
                'params' => array(
                        'adminEmail' => 'webmaster@example.com',
                        
                        'author' => 'Denis Ivanov',
                        'email' => 'denquick@gmail.com',
                ),
                )
);
