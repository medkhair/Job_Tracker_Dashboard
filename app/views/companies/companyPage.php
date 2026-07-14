<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h2>Company Details</h2>
        <p class="text-muted"><?php echo htmlspecialchars($company['name']); ?></p>
    </div>
    <a class="btn btn-secondary" href="?c=companies">Back to list</a>
</div>
<div class="card">
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3">Name</dt>
            <dd class="col-sm-9"><?php echo htmlspecialchars($company['name']); ?></dd>

            <dt class="col-sm-3">City</dt>
            <dd class="col-sm-9"><?php echo htmlspecialchars($cityName ?: 'N/A'); ?></dd>

            <dt class="col-sm-3">Website</dt>
            <dd class="col-sm-9"><?php echo $company['website'] ? '<a href="' . htmlspecialchars($company['website']) . '" target="_blank">' . htmlspecialchars($company['website']) . '</a>' : '<span class="text-muted">N/A</span>'; ?></dd>

            <dt class="col-sm-3">Career URL</dt>
            <dd class="col-sm-9"><?php echo $company['career_url'] ? '<a href="' . htmlspecialchars($company['career_url']) . '" target="_blank">' . htmlspecialchars($company['career_url']) . '</a>' : '<span class="text-muted">N/A</span>'; ?></dd>

            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9"><?php echo $company['email'] ? htmlspecialchars($company['email']) : '<span class="text-muted">N/A</span>'; ?></dd>

            <dt class="col-sm-3">Notes</dt>
            <dd class="col-sm-9"><?php echo $company['notes'] ? nl2br(htmlspecialchars($company['notes'])) : '<span class="text-muted">N/A</span>'; ?></dd>
        </dl>
    </div>
</div>
