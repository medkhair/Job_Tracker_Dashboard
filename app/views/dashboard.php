<div class="summary">
    <div class="card">Total Companies: <strong><?php echo htmlspecialchars($totalCompanies); ?></strong></div>
    <div class="card">Total Applications: <strong><?php echo htmlspecialchars($totalApplications); ?></strong></div>
</div>

<h2>Applications by Status</h2>
<table class="table">
    <tr><th>Status</th><th>Count</th></tr>
    <?php foreach ($counts as $row): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['count']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<h2>Companies</h2>
<table class="table">
    <tr><th>Company</th><th>Website</th><th>Career URL</th><th>Email</th><th>Status</th><th>Notes</th></tr>
    <?php foreach ($companies as $c): ?>
        <tr>
            <td><?php echo htmlspecialchars($c['name']); ?></td>
            <td><?php if ($c['website']): ?><a href="<?php echo htmlspecialchars($c['website']); ?>" target="_blank">site</a><?php endif; ?></td>
            <td><?php if ($c['career_url']): ?><a href="<?php echo htmlspecialchars($c['career_url']); ?>" target="_blank">careers</a><?php endif; ?></td>
            <td><?php echo htmlspecialchars($c['email']); ?></td>
            <td><?php echo htmlspecialchars($c['status'] ?? 'No Response'); ?></td>
            <td><?php echo htmlspecialchars($c['notes']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
