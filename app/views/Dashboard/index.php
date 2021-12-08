
<h1>Welcome <span id = "dashboard-username"><?= $data["name"] ?><span></h1>
<a href = "<?= BASEURL ?>/dashboard/logout">Logout</a>
<button id = "btnadd">Add your to do list</button>
        
        <?php $counter = 0; ?>
        <?php foreach($data["dashboard"] as $row) : ?>
            <div class = "todo-card" id = "todo-card-<?= $counter ?>">
            
                <i class="fa fa-trash-o" id = "trash-<?= $row['id']; ?>" style="font-size:36px"></i>
                <span class="todo-id" id ="todo-id-<?= $counter; ?>"><?= $row['id'] ?></span>
                <h5><?= $row['title']; ?></h5>
                <span><?= $row['description']; ?></span>
                <span class ="todo-date-modified">Last modified : <?= date('d M Y', strtotime($row['last_modified'])) ?></span>
                <?php $counter++; ?>
            </div>
        <?php endforeach ?>
    
   
<div class = "my-modal">
    <div class = "my-modal-header">
        <span id = 'my-modal-header-text'>Add Your To Do List</span>
        <span class="close">&times;</span>        
    </div>
   
    <div class = "my-modal-body">
        <div class = "my-modal-body-form">
            <!--form action = "<?= BASEURL ?>/dashboard/add" method = "post"-->
            <form action = "" method = "post">
                <input type = "text" name = "id" id = "todo-id-hidden">
                <label for = "name" style = "display:none;">Name : </label><input type = "hidden" name = "name" id = "name" value = "<?= $data["name"] ?>">
                <label for = "title">Title : </label><input type = "text" name = "title" id = "title">
                <label for = "description">Description : </label><textarea id = "description" name = "description"></textarea>
                <label for = "duedate">Due Date : </label><input type = "date" name = "duedate" placeholder = "Enter Date" id = "duedate">
                <button type = "submit" name = "addtodolist" id = "btnsubmit">Save</button>
            </form>
        </div>
    </div>
</div>