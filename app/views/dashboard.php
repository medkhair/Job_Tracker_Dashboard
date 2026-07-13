<div class="row">
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Companies</h5>
                <p class="card-text display-6"><?php echo htmlspecialchars($totalCompanies); ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Applications</h5>
                <p class="card-text display-6"><?php echo htmlspecialchars($totalApplications); ?></p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <h4>Applications by Status</h4>
        <ul class="list-group">
            <?php foreach ($counts as $row): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo htmlspecialchars($row['name']); ?>
                    <span class="badge bg-primary rounded-pill"><?php echo htmlspecialchars($row['count']); ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-md-6">
        <h4>Recent Companies</h4>
        <table class="table table-sm">
            <thead><tr><th>Name</th><th>Status</th></tr></thead>
            <tbody>
            <?php foreach ($companies as $c): ?>
                <tr>
                    <td><?php echo htmlspecialchars($c['name']); ?></td>
                    <td><?php echo htmlspecialchars($c['status'] ?? 'No Response'); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
