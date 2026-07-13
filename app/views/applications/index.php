<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Applications</h2>
    <a class="btn btn-success" href="?c=applications&a=create">New Application</a>
</div>
<table class="table table-sm">
    <thead><tr><th>ID</th><th>Company</th><th>Status</th><th>Notes</th><th>Actions</th></tr></thead>
    <tbody>
    <?php foreach ($apps as $a): ?>
        <tr>
            <td><?php echo $a['id']; ?></td>
            <td><?php echo htmlspecialchars($a['company']); ?></td>
            <td><?php echo htmlspecialchars($a['status']); ?></td>
            <td><?php echo htmlspecialchars($a['notes']); ?></td>
            <td>
                <a class="btn btn-sm btn-primary" href="?c=applications&a=edit&id=<?php echo $a['id']; ?>">Edit</a>
                <a class="btn btn-sm btn-danger" href="?c=applications&a=delete&id=<?php echo $a['id']; ?>" onclick="return confirm('Delete?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
