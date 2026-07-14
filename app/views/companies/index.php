

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Companies</h2>
    <a class="btn btn-success" href="?c=companies&a=create">New Company</a>
</div>

<form method="get" class="row g-2 align-items-end mb-3">
    <input type="hidden" name="c" value="companies">
    <div class="col-auto">
        <label class="form-label">Application</label>
        <select class="form-select form-select-sm" name="status_filter">
            <option value="all" <?php echo (($statusFilter ?? 'all') === 'all') ? 'selected' : ''; ?>>All</option>
            <option value="applied" <?php echo (($statusFilter ?? 'all') === 'applied') ? 'selected' : ''; ?>>Applied</option>
            <option value="non_applied" <?php echo (($statusFilter ?? 'all') === 'non_applied') ? 'selected' : ''; ?>>Non Applied</option>
        </select>
    </div>
    <div class="col-auto">
        <label class="form-label">City</label>
        <select class="form-select form-select-sm" name="city_id">
            <option value="">All Cities</option>
            <?php foreach ($cities ?? [] as $city): ?>
                <option value="<?php echo $city['id']; ?>" <?php echo (($selectedCityId ?? null) == $city['id']) ? 'selected' : ''; ?>><?php echo htmlspecialchars($city['name']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-secondary btn-sm">Filter</button>
        <a class="btn btn-outline-light btn-sm" href="?c=companies">Reset</a>
    </div>
</form>

<table class="table table-striped">
    <thead><tr><th>Name</th><th>City</th><th>Email</th><th>Actions</th></tr></thead>
    <tbody>
    <?php foreach ($companies ?? [] as $c): ?>
        <tr>
            <td><?php echo htmlspecialchars($c['name']); ?></td>
            <td><?php echo htmlspecialchars(isset($getCompanieCityName) ? $getCompanieCityName($c['city_id']) : ''); ?></td>
            <td><?php 
                $c['email'] == null ? print('<span class="text-muted">N/A</span>') : print(htmlspecialchars($c['email']));
            ?></td>
            <td>
                <a class="btn btn-sm btn-primary" href="?c=companies&a=edit&id=<?php echo $c['id']; ?>">Edit</a>
                <a class="btn btn-sm btn-danger" href="?c=companies&a=delete&id=<?php echo $c['id']; ?>" onclick="return confirm('Delete?')">Delete</a>
                <a class="btn btn-sm btn-info" href="?c=companies&a=show&id=<?php echo $c['id']; ?>"><i class="bi bi-eye"></i></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
