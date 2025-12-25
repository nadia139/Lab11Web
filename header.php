<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Data Barang - PHP OOP</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container { 
            max-width: 1200px; 
            margin: 0 auto; 
            background: white; 
            padding: 0; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.2); 
            border-radius: 10px;
            overflow: hidden;
        }
        header { 
            background: linear-gradient(to right, #007bff, #0056b3);
            color: white; 
            padding: 25px 30px;
            border-bottom: 3px solid #ffc107;
        }
        h1 { 
            font-size: 28px; 
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        h2 { 
            color: #333; 
            margin: 20px 0 15px 0;
            padding-bottom: 10px;
            border-bottom: 2px solid #007bff;
        }
        nav { 
            background: #f8f9fa; 
            padding: 15px 30px; 
            border-bottom: 1px solid #dee2e6;
            display: flex;
            gap: 10px;
        }
        nav a { 
            color: #495057; 
            text-decoration: none; 
            padding: 10px 20px; 
            display: inline-block; 
            border-radius: 5px; 
            border: 1px solid transparent;
            transition: all 0.3s;
        }
        nav a:hover { 
            background: #007bff; 
            color: white; 
            border-color: #007bff;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        table th { 
            background: #007bff; 
            color: white; 
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }
        table td { 
            padding: 12px 15px; 
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }
        table tr:hover { 
            background: #f8f9fa; 
        }
        .btn { 
            padding: 8px 16px; 
            text-decoration: none; 
            color: white; 
            border-radius: 4px; 
            display: inline-block; 
            margin: 2px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            transition: opacity 0.3s;
        }
        .btn:hover { opacity: 0.9; }
        .btn-primary { background: #007bff; }
        .btn-success { background: #28a745; }
        .btn-warning { background: #ffc107; color: #212529; }
        .btn-danger { background: #dc3545; }
        .alert { 
            padding: 15px; 
            margin: 15px 0; 
            border-radius: 5px; 
            border: 1px solid transparent;
        }
        .alert-success { 
            background: #d4edda; 
            color: #155724; 
            border-color: #c3e6cb; 
        }
        .alert-danger { 
            background: #f8d7da; 
            color: #721c24; 
            border-color: #f5c6cb; 
        }
        .alert-info { 
            background: #d1ecf1; 
            color: #0c5460; 
            border-color: #bee5eb; 
        }
        input[type="text"], input[type="number"], textarea, select, input[type="file"] { 
            width: 100%; 
            padding: 10px; 
            margin: 5px 0; 
            border: 1px solid #ced4da; 
            border-radius: 4px; 
            font-size: 16px;
        }
        input[type="submit"] { 
            background: #007bff; 
            color: white; 
            border: none; 
            padding: 12px 25px; 
            cursor: pointer; 
            border-radius: 4px; 
            font-size: 16px;
            transition: background 0.3s;
        }
        input[type="submit"]:hover { background: #0056b3; }
        img { 
            max-width: 100px; 
            height: auto;
            border-radius: 4px;
            border: 1px solid #ddd;
            padding: 3px;
        }
        footer { 
            text-align: center; 
            padding: 20px; 
            color: #666; 
            background: #f8f9fa;
            border-top: 1px solid #dee2e6;
            margin-top: 30px;
        }
        .content { padding: 30px; }
        .no-data { 
            text-align: center; 
            padding: 40px; 
            color: #6c757d;
            font-size: 18px;
        }
        .action-buttons { display: flex; gap: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>📦 Sistem Manajemen Data Barang</h1>
            <p style="opacity: 0.9;">PHP OOP Modular - Database: latihan1</p>
        </header>
        
        <nav>
            <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/lab11_php_oop/artikel/index">🏠 Dashboard</a>
            <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/lab11_php_oop/artikel/tambah">➕ Tambah Barang</a>
            <a href="http://localhost/phpmyadmin/index.php?route=/table/structure&db=latihan1&table=data_barang" target="_blank">📊 Database</a>
        </nav>
        
        <!-- TAMBAHKAN INI -->
        <?php include $base_path . "/template/sidebar.php"; ?>
        
        <div class="content">