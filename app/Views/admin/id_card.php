<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; }
        .id-card { width: 300px; height: 200px; border: 2px solid #000; padding: 10px; }
        .logo { text-align: center; font-size: 20px; font-weight: bold; }
        .member-info { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="id-card">
        <div class="logo">NGO NAME</div>
        <div class="member-info">
            <strong>ID: <?= $member['id'] ?></strong><br>
            Name: <?= $member['name'] ?><br>
            Email: <?= $member['email'] ?><br>
            Phone: <?= $member['phone'] ?><br>
            Valid Till: 31-12-2026
        </div>
    </div>
</body>
</html>