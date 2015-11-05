<?php

/**
 *
 * h2first - simple module for Contao 3 to change the ordering for the headlines
 * to not start with a h1
 *
 * Copyright (C) 2015  Friedrich Pfitzmann Software Solutions
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

if ($GLOBALS['TL_CONFIG']['useRTE']):

    ?>
    <script>window.tinymce || document.write('<script src="<?php echo TL_ASSETS_URL; ?>assets/tinymce4/tinymce.gzip.js">\x3C/script>')</script>
    <script>
        window.tinymce && tinymce.init({
            skin: "contao",
            selector: "#<?php echo $selector; ?>",
            language: "<?php echo Backend::getTinyMceLanguage(); ?>",
            element_format: "html",
            document_base_url: "<?php echo Environment::get('base'); ?>",
            entities: "160,nbsp,60,lt,62,gt,173,shy",
            init_instance_callback: function(editor) {
                editor.on('focus', function(){ Backend.getScrollOffset(); });
            },
            file_browser_callback: function(field_name, url, type, win) {
                Backend.openModalBrowser(field_name, url, type, win);
            },
            templates: [
                <?php echo Backend::getTinyTemplates(); ?>
            ],
            //style_formats_merge: true,
            style_formats: [
            /*    {title: "Headers", items: [
                    {title: "Header 2", format: "h2"},
                    {title: "Header 3", format: "h3"},
                    {title: "Header 4", format: "h4"},
                    {title: "Header 5", format: "h5"},
                    {title: "Header 6", format: "h6"},
                    {title: "Header 1", format: "h1"}
                ]},
                {title: "Inline", items: [
                    {title: "Bold", icon: "bold", format: "bold"},
                    {title: "Italic", icon: "italic", format: "italic"},
                    {title: "Underline", icon: "underline", format: "underline"},
                    {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
                    {title: "Superscript", icon: "superscript", format: "superscript"},
                    {title: "Subscript", icon: "subscript", format: "subscript"},
                    {title: "Code", icon: "code", format: "code"}
                ]},
                {title: "Blocks", items: [
                    {title: "Paragraph", format: "p"},
                    {title: "Blockquote", format: "blockquote"},
                    {title: "Div", format: "div"},
                    {title: "Pre", format: "pre"}
                ]},
                {title: "Alignment", items: [
                    {title: "Left", icon: "alignleft", format: "alignleft"},
                    {title: "Center", icon: "aligncenter", format: "aligncenter"},
                    {title: "Right", icon: "alignright", format: "alignright"},
                    {title: "Justify", icon: "alignjustify", format: "alignjustify"}
                ]}*/
            ],
           //plugins: "autosave charmap code fullscreen image importcss link lists paste searchreplace tabfocus table template visualblocks",
            plugins: "autosave fullscreen link lists paste searchreplace tabfocus template visualblocks",
            external_plugins: {"wordcount": "<?php echo TL_PATH; ?>/system/modules/pfiss-minimal_tiny_mce/assets/tinyMCE/plugins/wordcount/plugin.min.js"},
            browser_spellcheck: true,
            tabfocus_elements: ":prev,:next",
            importcss_append: true,
            importcss_groups: [{title: "<?php echo Config::get('uploadPath'); ?>/tinymce.css"}],
            content_css: "<?php echo TL_PATH; ?>/system/themes/tinymce.css,<?php echo TL_PATH . '/' . Config::get('uploadPath'); ?>/tinymce.css",
            extended_valid_elements: "q[cite|class|title],article,section,hgroup,figure,figcaption",
            menubar: "file edit insert view format table",
            toolbar: "link  | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | undo redo"
        });
    </script>
<?php endif; ?>