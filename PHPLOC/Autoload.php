<?php
/**
 * phploc
 *
 * Copyright (c) 2009-2012, Sebastian Bergmann <sb@sebastian-bergmann.de>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Sebastian Bergmann nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package   phploc
 * @author    Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @copyright 2009-2012 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license   http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @since     File available since Release 1.7.0
 */

require 'Symfony/Component/Finder/Finder.php';
require 'Symfony/Component/Finder/Glob.php';
require 'Symfony/Component/Finder/Iterator/FileTypeFilterIterator.php';
require 'Symfony/Component/Finder/Iterator/FilenameFilterIterator.php';
require 'Symfony/Component/Finder/Iterator/RecursiveDirectoryIterator.php';
require 'Symfony/Component/Finder/Iterator/ExcludeDirectoryFilterIterator.php';
require 'Symfony/Component/Finder/Iterator/MultiplePcreFilterIterator.php';
require 'Symfony/Component/Finder/SplFileInfo.php';
require 'ezc/Base/base.php';

spl_autoload_register(
    function($class) {
        static $classes = null;

        if ($classes === null) {
            $classes = array(
              'phploc_analyser' => '/Analyser.php',
              'phploc_textui_command' => '/TextUI/Command.php',
              'phploc_textui_resultprinter_csv' => '/TextUI/ResultPrinter/CSV.php',
              'phploc_textui_resultprinter_text' => '/TextUI/ResultPrinter/Text.php',
              'phploc_textui_resultprinter_xml' => '/TextUI/ResultPrinter/XML.php'
            );
        }

        $cn = strtolower($class);

        if (isset($classes[$cn])) {
            require dirname(__FILE__) . $classes[$cn];
        }
    }
);

spl_autoload_register(array('ezcBase', 'autoload'));
