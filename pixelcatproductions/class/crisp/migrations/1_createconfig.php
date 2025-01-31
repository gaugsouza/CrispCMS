<?php

/*
 * Copyright 2020 Pixelcat Productions <support@pixelcatproductions.net>
 * @author 2020 Justin René Back <jback@pixelcatproductions.net>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace crisp\migrations;

class createconfig extends \crisp\core\Migrations {

    public function run() {
        try {
            $this->begin();
            $this->createTable("Config",
                    array("key", $this::DB_VARCHAR),
                    array("value", $this::DB_TEXT),
                    array("last_changed", $this::DB_TIMESTAMP, "DEFAULT NULL"),
                    array("type", $this::DB_VARCHAR, "NOT NULL DEFAULT 'string'"),
                    array("created_at", $this::DB_TIMESTAMP, "NOT NULL DEFAULT CURRENT_TIMESTAMP")
            );
            $this->addIndex("Config", "key", $this::DB_PRIMARYKEY);
            
            return $this->end();
        } catch (\Exception $ex) {
            echo $ex->getMessage() . PHP_EOL;
            $this->rollback();
            return false;
        }
    }

}
