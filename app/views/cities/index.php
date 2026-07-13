<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Cities</h2>
    <a class="btn btn-success" href="?c=cities&a=create">New City</a>
</div>
<table class="table">
    <thead><tr><th>Name</th><th>Actions</th></tr></thead>
    <tbody>
    <?php foreach ($cities as $city): ?>
        <tr>
            <td><?php echo htmlspecialchars($city['name']); ?></td>
            <td>
                <a class="btn btn-sm btn-primary" href="?c=cities&a=edit&id=<?php echo $city['id']; ?>">Edit</a>
                <a class="btn btn-sm btn-danger" href="?c=cities&a=delete&id=<?php echo $city['id']; ?>" onclick="return confirm('Delete?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
