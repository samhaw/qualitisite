<?php
/*
 * This file is a part of Mibew Messenger.
 *
 * Copyright 2005-2016 the original author or authors.
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

namespace Mibew\Style;

// Import namespaces and classes of the core
use Mibew\Settings;

/**
 * Represents a style for invitations
 */
class InvitationStyle extends AbstractStyle implements StyleInterface
{
    /**
     * Builds base path for style files. This path is relative Mibew root and
     * does not contain neither leading nor trailing slash.
     *
     * @return string Base path for style files
     */
    public function getFilesPath()
    {
        return 'styles/invitations/' . $this->getName();
    }

    /**
     * Stub for StyleInterface::render method.
     *
     * The method does not contain actual code because inviation styles are not
     * renderable now.
     */
    public function render($template_name, $data = array())
    {
        return false;
    }

    /**
     * Returns name of the style which shoud be used for the current request.
     *
     * Result of the method can depends on user role, requested page or any
     * other criteria.
     *
     * @return string Name of a style
     */
    public static function getCurrentStyle()
    {
        // Just use the default style
        return self::getDefaultStyle();
    }

    /**
     * Returns name of the style which is used in the system by default.
     *
     * @return string Name of a style
     */
    public static function getDefaultStyle()
    {
        // Load value from system settings
        return Settings::get('invitation_style');
    }

    /**
     * Sets style which is used in the system by default
     *
     * @param string $style_name Name of a style
     */
    public static function setDefaultStyle($style_name)
    {
        Settings::set('invitation_style', $style_name);
    }

    /**
     * Returns an array which contains names of available styles.
     *
     * @param array List of styles names
     */
    public static function getAvailableStyles()
    {
        $styles_root = MIBEW_FS_ROOT . '/styles/invitations';

        return self::getStyleList($styles_root);
    }

    /**
     * Returns array of default configurations for concrete style object. This
     * method uses "Template method" design pattern.
     *
     * @return array Default configurations of the style
     */
    protected function getDefaultConfigurations()
    {
        return array();
    }
}
