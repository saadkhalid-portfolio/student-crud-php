<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #45a049;
        }

        .msg {
            text-align: center;
            margin-bottom: 15px;
            font-weight: bold;
        }

        /* Back button style */
        .back-btn {
            display: inline-block;
            padding: 8px 15px;
            background: #ccc;
            color: #000;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: background 0.3s;
        }

        .back-btn:hover {
            background: #bbb;
        }

        #imgdiv{
            display:flex;
            align-items:center;
            gap:4px;
            margin-bottom:20px;
        }
        #subject_div{
            display:flex;
            align-items:center;
            justify-content: space-between;
            margin-bottom:20px;
        }
        #subject_div h2{
            width: 70%; 
             margin: 0;    
        }
        #add_subject {
             width: 30%;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 6px 12px;
            font-size: 20px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        #add_subject:hover {
            background-color: #45a049;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Student</h2>

        <!-- Back button -->
        <div style="text-align: right;">
            <a href="index.php" class="back-btn">← Back</a>
        </div>

        <?php
        // if(!empty($msg)) echo "<div class='msg'>$msg</div>";
        ?>

        <form method="POST" action="store.php" enctype="multipart/form-data">
            <label>Name:</label>
            <input type="text" name="name" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Number:</label>
            <input type="text" name="number" required>

            <label>Address:</label>
            <textarea name="address" required></textarea>
            
            <div id="subject_div">
                <h2 style="margin-bottom:10px; display:flex;">Add Subject Marks</h2>
                <button id="add_subject">&#x2B</button>
            </div>
            <div id="parent_subject_section"></div>
            <div id="imgdiv">
                <div>
                    <label>Student Picture</label>
                    <input type="file" name="st_pic" id="st_pic" required>
                </div>
                <div id="preview"></div>
            </div>


            <button type="submit" name="submit">Add</button>
        </form>
    </div>
    <script>

      const st_pic = document.getElementById("st_pic");
      const preview = document.getElementById("preview");

      st_pic.addEventListener('change',function(e){
      const file = e.target.files[0];
      preview.innerHTML = '';
      if(file){
        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.alt = "Preview";

        // optional: style
        img.style.width = '150px';
        img.style.height = '150px';
        img.style.objectFit = 'cover';
        img.style.borderRadius = '6px';
        img.style.border = '1px solid #ccc';

        preview.appendChild(img);

        const delimg = document.createElement('button');
        delimg.innerText = "X";
        delimg.id = "delimg";

        preview.appendChild(delimg);

        delimg.addEventListener('click',function(){
            preview.innerHTML = '';
            st_pic.value = '';
        });
        


      }
      

      });

    </script>
</body>
</html>
