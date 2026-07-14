

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Companies</h2>
    <a class="btn btn-success" href="?c=companies&a=create">New Company</a>
</div>
<table class="table table-striped">
    <thead><tr><th>Name</th><th>City</th><th>Email</th><th>Actions</th></tr></thead>
    <tbody>
    <?php foreach ($companies as $c): ?>
        <tr>
            <td><?php echo htmlspecialchars($c['name']); ?></td>
            <td><?php echo htmlspecialchars($getCompanieCityName($c['city_id'])); ?></td>
            <td><?php 
                $c['email'] == null ? print('<span class="text-muted">N/A</span>') : print(htmlspecialchars($c['email']));
            ?></td>
            <td>
                <a class="btn btn-sm btn-primary" href="?c=companies&a=edit&id=<?php echo $c['id']; ?>">Edit</a>
                <a class="btn btn-sm btn-danger" href="?c=companies&a=delete&id=<?php echo $c['id']; ?>" onclick="return confirm('Delete?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
