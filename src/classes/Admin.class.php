<?php

class qbWpListsAdmin
{
    private $install = null;
    private $collections = null;

    public function __construct($collections)
    {
        $this->collections = $collections;
        add_action('admin_menu', [$this, 'adminMenu']);
        add_action('admin_print_footer_scripts', [$this, 'footerScripts']);
        register_activation_hook(QBWPLISTS_FILE, [$this, 'activation']);
        register_deactivation_hook(QBWPLISTS_FILE, [$this, 'deactivation']);
    }

    public function adminMenu()
    {
        /*
       * In situations where a plugin is creating its own top-level menu, the first
       * submenu will normally have the same link title as the top-level menu and
       * hence the link will be duplicated. The duplicate link title can be avoided
       * by calling the add_submenu_page function the first time with the parent_slug
       * and menu_slug parameters being given the same value.
       */
        $firstId = array_keys($this->collections)[0];
        add_menu_page('Qb Wp Lists', 'Qb Wp Lists', 'edit_others_posts', QBWPLISTS_ID . $firstId, [$this, 'getSubmenuPage'], null, 3);
        foreach ($this->collections as $id => $definition) {
            add_submenu_page(QBWPLISTS_ID . $firstId, $definition['title'], $definition['title'], 'edit_others_posts', QBWPLISTS_ID . $id, [$this, 'getSubmenuPage']);
        }
    }

    public function footerScripts()
    {
        if (wp_script_is('quicktags')) {
            ?>
            <script type="text/javascript">
            <?php
            foreach ($this->collections as $id => $definition) {
                $shortcode = '[' . QBWPLISTS_ID . 'shortcode id=\"' . $id . '\"]';
                $description = 'Wstawi listę `' . $definition['title'] . '`';
                echo 'QTags.addButton("' . QBWPLISTS_ID . $id . '", "' . $definition['title'] . '", "' . $shortcode . '", "", "", "' . $description . '", 1);';
            }

            $shortcode = '[' . QBWPLISTS_ID . 'contact id=\"\"]';
            $description = 'Wstawi formularz kontaktowy o wybranym id';
            echo 'QTags.addButton("' . QBWPLISTS_ID . 'contact", "Formularz kontaktowy", "' . $shortcode . '", "", "", "' . $description . '", 1);'; ?>
                </script>
            <?php

        }
    }

    public function activation()
    {
        $this->install = qbWpListsLoadClass('Install', true, $this->collections);
        $this->install->install();
    }

    public function deactivation()
    {
        global $wpdb;
        $wpdb->query('DROP TABLE ' . QBWPLISTS_TABLE . 'contact_nonces');
        foreach ($this->collections as $id => $definition) {
            // $wpdb->query('DROP TABLE ' . QBWPLISTS_TABLE . $id);
        }
    }

    public function getSubmenuPage()
    {
        $page = str_replace(QBWPLISTS_ID, '', filter_input(INPUT_GET, 'page'));
        if (empty($this->$page)) {
            $this->$page = qbWpListsLoadClass('AdminPage', true, $this->collections[$page]);
        }
        $this->$page->getPage();
        $this->enqueueResources();
    }

    public function enqueueResources()
    {
        /* enqueue jquery and jquery.datatables to enhance the table we will produce */
      wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_script('jquery.datatables', QBWPLISTS_URL . 'public/jquery.dataTables.min.js', ['jquery']);
        wp_enqueue_script(QBWPLISTS_ID, QBWPLISTS_URL . 'public/' . QBWPLISTS_ID . '.min.js', ['jquery', 'jquery-ui-datepicker']);
        wp_enqueue_style(QBWPLISTS_ID, QBWPLISTS_URL . 'public/' . QBWPLISTS_ID . '.css');
    }
}
