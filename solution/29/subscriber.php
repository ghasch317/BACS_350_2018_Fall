<?php

    // Bring in subscribers logic
    require_once 'db.php';

    // Show form for adding a record
    function edit_subscriber_view($page, $record) {
        $id    = $record['id'];
        $name  = $record['name'];
        $email = $record['email'];
        return '
            <div class="card">
                <h3>Edit Subscriber</h3>
                <form action="' . $page . '" method="post">
                    <p><label>Name:</label> &nbsp; <input type="text" name="name" value="' . $name . '"></p>
                    <p><label>Email:</label> &nbsp; <input type="text" name="email" value="' . $email . '"></p>
                    <p><input type="submit" value="Save Record"/></p>
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" value="' . $id . '">
                </form>
            </div>
        ';
    }


    // Update the database
    function update_subscriber() {
        $id    = filter_input(INPUT_POST, 'id');
        $name  = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        
        echo "edit: $name $email";

        // Modify database row
        $query = "UPDATE subscribers SET name = :name, email = :email WHERE id = :id";
        global $db;
        $statement = $db->prepare($query);

        $statement->bindValue(':id', $id);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':email', $email);

        $statement->execute();
        $statement->closeCursor();
        
        header('Location: index.php');
    }
 

    // Lookup Record using ID
    function get_subscriber($db, $id) {
        $query = "SELECT * FROM subscribers WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $record = $statement->fetch();
        $statement->closeCursor();
        return $record;
    }


    // Query for all subscribers
    function query_subscribers ($db) {
        $query = "SELECT * FROM subscribers";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }


    // render_table -- Create a bullet list in HTML
    function subscriber_list($table) {
        $s = render_link('Add Subscriber', 'crud_create.php') . '<br><br>';
        $s .= '<table>';
        $s .= '<tr><th>Name</th><th>Email</th></tr>';
        foreach($table as $row) {
            $edit = render_link($row[1], "crud_update.php?id=$row[0]&action=edit");
            $email = $row[2];
            $delete = render_link("delete", "crud_delete.php?id=$row[0]&action=delete");
            $row = array($edit, $email, $delete);
            $s .= '<tr><td>' . implode('</td><td>', $row) . '</td></tr>';
        }
        $s .= '</table>';
        
        return $s;
    }


    // My Subscriber list
    class Subscribers {

        // Database connection
        private $db;

        
        // Automatically connect
        function __construct() {
            global $db;
            $this->db =  $db;
        }

        
        // CRUD
        
        function query() {
            return query_subscribers($this->db);
        }
        
    
        function clear() {
            return clear_subscribers($this->db);
        }
        
        
        function add($name, $email) {
            return add_subscriber ($this->db, $name, $email);
        }
        
        function handle_actions() {
            $id = filter_input(INPUT_GET, 'id');
            
            // POST
            $action = filter_input(INPUT_POST, 'action');
            if ($action == 'create') {
                $name  = filter_input(INPUT_POST, 'name');
                $email = filter_input(INPUT_POST, 'email');
                $this->add($name, $email);
            }
            if ($action == 'update') {
                $subscribers->update();
            }
            
            // GET
            $action = filter_input(INPUT_GET, 'action');
            if ($action == 'add') {
                $this->add_view();
            }
            if ($action == 'clear') {
                $this->clear();
            }
            if ($action == 'edit' and ! empty($id)) {
                return $subscribers->edit_view($id);
            }
        }
        
        
        function update() {
            update_subscriber();
        }
        
        // Views
        
        function show_list() {
            return subscriber_list($this->query());
        }
        
        
        function add_view() {
            add_subscriber_form();
        }
        
        function edit_view($id) {
            $page = 'crud_edit.php';
            $record = $subscribers->get($id);
            return edit_subscriber_view($page, $record);
        }
    }


    // Create a list object and connect to the database
    $subscribers = new Subscribers;

?>
