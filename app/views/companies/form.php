<h2><?php echo $company ? 'Edit Company' : 'New Company'; ?></h2>
<form method="post">
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input class="form-control" name="name" required value="<?php echo $company['name'] ?? ''; ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">City</label>
        <select class="form-select" name="city_id">
            <option value="">-- select --</option>
            <?php foreach ($cities as $city): ?>
                <option value="<?php echo $city['id']; ?>" <?php if (($company['city_id'] ?? '') == $city['id']) echo 'selected'; ?>><?php echo htmlspecialchars($city['name']); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Website</label>
        <input class="form-control" name="website" value="<?php echo $company['website'] ?? ''; ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Career URL</label>
        <input class="form-control" name="career_url" value="<?php echo $company['career_url'] ?? ''; ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input class="form-control" name="email" value="<?php echo $company['email'] ?? ''; ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Notes</label>
        <textarea class="form-control" name="notes"><?php echo $company['notes'] ?? ''; ?></textarea>
    </div>
    <button class="btn btn-primary">Save</button>
    <a class="btn btn-secondary" href="?c=companies">Cancel</a>
</form>
