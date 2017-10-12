<?php
/*
 * This file is a part of Mibew Messenger.
 *
 * Copyright 2005-2015 the original author or authors.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

use Symfony\Component\Yaml\Parser as YamlParser;

/**
 * Loads system configurations.
 *
 * The configs are cached inside the function.
 *
 * @return array Associative array of system configs.
 */
function load_system_configs()
{
    static $configs = null;

    if (is_null($configs)) {
        $parser = new YamlParser();
        $configs = $parser->parse(file_get_contents(MIBEW_FS_ROOT . '/configs/config.yml'));
		
        require_once(dirname(__FILE__).'/../../config_instalador.php');
        
        $configs['database']['host'] = DB_SERVIDOR;
        $configs['database']['port'] = 3306;
        $configs['database']['db'] = DB_NOME;
        $configs['database']['login'] = DB_USUARIO;
        $configs['database']['pass'] = DB_SENHA;
        $configs['database']['tables_prefix'] = PREFIXO.'__';
        
        $configs['mailer']['host'] = MAIL_SERVIDOR;
        $configs['mailer']['port'] = 587;
        $configs['mailer']['user'] = MAIL_USUARIO;
        
        // Mailer configs are not necessary and can be omited but the section
        // must exist anyway. Empty statement is used to make sure null, false
        // and "" will be converted to an empty array.
        if (empty($configs['mailer'])) {
            $configs['mailer'] = array();
        }

        // Cache section must extst too. The logic behind "empty" statement is
        // the same as above.
        if (empty($configs['cache'])) {
            $configs['cache'] = array();
        }
    }

    return $configs;
}
