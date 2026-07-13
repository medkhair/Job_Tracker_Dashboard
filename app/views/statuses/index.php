<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Statuses</h2>
    <a class="btn btn-success" href="?c=statuses&a=create">New Status</a>
</div>
<table class="table">
    <thead><tr><th>Name</th><th>Actions</th></tr></thead>
    <tbody>
    <?php foreach ($statuses as $s): ?>
        <tr>
            <td><?php echo htmlspecialchars($s['name']); ?></td>
            <td>
                <a class="btn btn-sm btn-primary" href="?c=statuses&a=edit&id=<?php echo $s['id']; ?>">Edit</a>
                <a class="btn btn-sm btn-danger" href="?c=statuses&a=delete&id=<?php echo $s['id']; ?>" onclick="return confirm('Delete?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
