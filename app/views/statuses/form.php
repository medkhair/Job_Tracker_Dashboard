<h2><?php echo $status ? 'Edit Status' : 'New Status'; ?></h2>
<form method="post">
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input class="form-control" name="name" required value="<?php echo $status['name'] ?? ''; ?>">
    </div>
    <button class="btn btn-primary">Save</button>
    <a class="btn btn-secondary" href="?c=statuses">Cancel</a>
</form>
