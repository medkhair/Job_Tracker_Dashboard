<h2><?php echo $app ? 'Edit Application' : 'New Application'; ?></h2>
<form method="post">
    <div class="mb-3">
        <label class="form-label">Company</label>
        <select class="form-select" name="company_id" required>
            <?php foreach ($companies as $c): ?>
                <option value="<?php echo $c['id']; ?>" <?php if (($app['company_id'] ?? '') == $c['id']) echo 'selected'; ?>><?php echo htmlspecialchars($c['name']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select class="form-select" name="status_id" required>
            <?php foreach ($statuses as $s): ?>
                <option value="<?php echo $s['id']; ?>" <?php if (($app['status_id'] ?? '') == $s['id']) echo 'selected'; ?>><?php echo htmlspecialchars($s['name']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Notes</label>
        <textarea class="form-control" name="notes"><?php echo $app['notes'] ?? ''; ?></textarea>
    </div>
    <button class="btn btn-primary">Save</button>
    <a class="btn btn-secondary" href="?c=applications">Cancel</a>
</form>
