<details>
  <summary><strong>Task Description (User Story)</strong></summary>

**What we are building:**  
We will create a login page where the user enters:
- A username,
- A password,
- A gender (radio buttons: male or female).

**Functionality:**  
- If any field is empty or the username/password is incorrect, the system will store an error message and the already provided data (except for the password) in the session.  
- The user is then redirected back to the form, where the error message is displayed at the top of the page and the previously entered data is re-filled in the form.  
- If the data is correct, a greeting is displayed indicating that the user has successfully logged in.

**Topics Covered:**  
- Creating an HTML form  
- Basic CSS styling  
- PHP variables, arrays, and conditional statements  
- Using PHP sessions and storing data  
- Redirecting with `header()` and `exit()`  
- Data validation and security measures (for example, `htmlspecialchars`)

**Useful Resources**  
- [PHP Getting Started](https://www.w3schools.com/php/php_getstarted.php)  
- [PHP Sessions](https://www.w3schools.com/php/php_sessions.asp)  
- [HTML Tutorial](https://www.w3schools.com/html/default.asp)  
- [CSS Tutorial](https://www.w3schools.com/css/)
- [PHP password hashes](https://www.php.net/manual/en/function.password-hash.php) 

**Example**  
![alt text](docassets/image-1.png)

**Displaying Errors**  
![alt text](docassets/image-2.png)

</details>

---

Below you will find a step-by-step example explained with **two** files: **index.php** (the form and initial page) and **action.php** (form processing). Each step includes the relevant code snippet so that it is possible to understand how everything works together. Afterward, you will see the **complete final code** where everything is assembled in the correct order, ready for use.

---

## 1. Basic HTML Setup

1. Create a file called **index.php**.  
2. Write the main HTML structure in it: `<!DOCTYPE html>`, `<html>`, `<head>`, and `<body>`.  
3. Add `<meta charset="UTF-8">` to ensure proper display of special characters.

**index.php (beginning)**:
```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
</head>
<body>

  <!-- We will add the form fields (Step 2), styles (Step 3), etc. here -->

</body>
</html>
```

---

## 2. Adding the Form Fields

1. In the same **index.php** file (between `<body>` and `</body>`), add the HTML input fields:
   - **Username** (text field)
   - **Password** (password field)
   - **Gender** (radio buttons: “Male” and “Female”)
   - A **Submit** button labeled “Submit”

2. Create a `<form>` tag to enclose these fields. (We can specify `action` and `method` now, but we'll discuss them in more detail in the following steps.)

**index.php (adding fields)**:
```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
</head>
<body>

  <h1>Login Page</h1>

  <form action="action.php" method="post">
    <!-- Username -->
    <label for="id_username">Username:</label>
    <input type="text" id="id_username" name="username"><br><br>

    <!-- Password -->
    <label for="id_password">Password:</label>
    <input type="password" id="id_password" name="password"><br><br>

    <!-- Gender (radio buttons) -->
    <label>Gender:</label>
    <input type="radio" id="gender_male" name="gender" value="male">
    <label for="gender_male">Male</label>

    <input type="radio" id="gender_female" name="gender" value="female">
    <label for="gender_female">Female</label>
    <br><br>

    <!-- Submit button -->
    <input type="submit" value="Submit">
  </form>

</body>
</html>
```

---

## 3. Adding Basic Styles

1. In the same **index.php** file, inside the `<head>` section, add a `<style>` tag to include some simple styles:
   - Background color
   - Font settings
   - Basic layout for the form and input fields

2. This step helps to see how just a bit of CSS can make the page look nicer.

**index.php (with initial styles)**:
```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <style>
    body {
      background-color: #f7f7f7;
      font-family: Arial, sans-serif;
      max-width: 500px;
      margin: auto; /* Center the content */
      padding: 1rem;
    }

    form {
      background-color: #fff;
      padding: 1rem;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    label {
      font-weight: bold;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 0.5rem;
      margin-top: 0.5rem;
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="radio"] {
      margin: 0 0.5rem 0 0;
    }

    input[type="submit"] {
      background-color: #3498db;
      color: #fff;
      padding: 0.7rem 1.2rem;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #2980b9;
    }
  </style>
</head>
<body>

  <h1>Login Page</h1>

  <form action="action.php" method="post">
    <label for="id_username">Username:</label>
    <input type="text" id="id_username" name="username">

    <label for="id_password">Password:</label>
    <input type="password" id="id_password" name="password">

    <label>Gender:</label>
    <input type="radio" id="gender_male" name="gender" value="male">
    <label for="gender_male">Male</label>
    <input type="radio" id="gender_female" name="gender" value="female">
    <label for="gender_female">Female</label>
    <br><br>

    <input type="submit" value="Submit">
  </form>

</body>
</html>
```

---

## 4. Specifying the Form’s Action

- In our form, we already have `action="action.php"` and `method="post"`.  
- This means that when the form is **submitted**, the data will be sent to **action.php** using the **POST** method.  
- Let’s now create the **action.php** file itself, although for now it will be very simple.

**action.php (empty, to see the structure)**:
```php
<?php
// We'll write the code to process the form here later
echo "The form data will be processed here!";
```

---

## 5. Processing the Action (Simply Reading the Data)

1. In **action.php**, let’s start by retrieving the data from `$_POST`.  
2. For now, we’ll just test by outputting what the user entered.

**action.php (basic processing)**:
```php
<?php
// Retrieve the data from the form
$username = $_POST['username'];
$password = $_POST['password'];
$gender   = $_POST['gender'];

// Output some test info (using echo for testing purposes)
echo "You entered the username: " . $username . "<br>";
echo "You entered the password: " . $password . "<br>";
echo "Your gender is: " . $gender . "<br>";
```

---

## 6. Field Validation

1. We need to check if the user **entered anything at all**.  
2. If something is missing, we inform them that some fields are missing and stop further processing.

**action.php (with field checking)**:
```php
<?php
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';
$gender   = isset($_POST['gender'])   ? trim($_POST['gender'])   : '';

// An array to track which fields are empty
$missing_fields = [];

// Check each field
if ($username === '') {
    $missing_fields[] = 'Username';
}
if ($password === '') {
    $missing_fields[] = 'Password';
}
if ($gender === '') {
    $missing_fields[] = 'Gender';
}

// If the array is not empty (some fields are missing)
if (!empty($missing_fields)) {
    echo "The following fields are required: " . implode(', ', $missing_fields);
    // End the script here
    exit();
}

// If everything is filled in, continue...
echo "Great! All fields are filled.<br>";
echo "Username: $username<br>";
echo "Gender: $gender<br>";
```

---

## 7. Adding Sessions

1. Let’s now add **sessions** so we can store error messages and previously entered data.  
2. We must first **start** the session in both **index.php** and **action.php** (right at the top of each file).  
3. By using `$_SESSION`, we can store and later retrieve the necessary data.

**index.php (now with session_start())**:
```php
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <style>
    /* CSS styles as before */
  </style>
</head>
<body>
  <h1>Login Page</h1>
  
  <!-- (We will add code for error display and re-loading session data) -->

  <form action="action.php" method="post">
    <!-- Same fields as before -->
  </form>
</body>
</html>
```

**action.php (with session_start() at the top):**
```php
<?php
session_start(); // Start the session

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';
$gender   = isset($_POST['gender'])   ? trim($_POST['gender'])   : '';

$missing_fields = [];

// Check for empty fields
if ($username === '') {
    $missing_fields[] = 'Username';
}
if ($password === '') {
    $missing_fields[] = 'Password';
}
if ($gender === '') {
    $missing_fields[] = 'Gender';
}

// If some fields are empty
if (!empty($missing_fields)) {
    // Store the error message in the session
    $_SESSION['errors'] = "The following fields are required: " . implode(', ', $missing_fields);

    // Store the entered data (so we can re-populate the form)
    $_SESSION['old_data'] = [
        'username' => $username,
        'gender'   => $gender
        // For security reasons, we typically do not store the password
    ];

    // Redirect back to index.php
    header("Location: index.php");
    exit();
}

// If everything is fine, we can check whether the username and password match
// For example, compare against a predefined array or DB record.
// As an example, let’s create an array for testing:

$users = [
  'admin' => 'admin123',
  'user1' => 'mypassword'
];

if (array_key_exists($username, $users) && $users[$username] === $password) {
    // Correct username and password
    echo "Hello, " . htmlspecialchars($username) . "! You have successfully logged in.<br>";
    echo "Your gender: " . htmlspecialchars($gender);
} else {
    // Incorrect username or password
    $_SESSION['errors'] = "Incorrect username or password.";
    $_SESSION['old_data'] = [
        'username' => $username,
        'gender'   => $gender
    ];
    header("Location: index.php");
    exit();
}
```

---

## 8. Returning to the Form and Using Session Data

1. When we return to **index.php**, if there are session errors or previous input data, we can display them.  
2. We check `$_SESSION['errors']` and show an error message if it exists.  
3. Using `$_SESSION['old_data']`, we set the `<input>` field’s `value=""` so we can “remember” what was previously entered.

**index.php (with error display and repopulating data):**
```php
<?php
session_start();

// Save the error message in a variable and then remove it from the session
$error_message = isset($_SESSION['errors']) ? $_SESSION['errors'] : '';
unset($_SESSION['errors']);

// Save old_data and remove it from the session afterward
$old_data = isset($_SESSION['old_data']) ? $_SESSION['old_data'] : [];
unset($_SESSION['old_data']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <style>
    body {
      background-color: #f7f7f7;
      font-family: Arial, sans-serif;
      max-width: 500px;
      margin: auto;
      padding: 1rem;
    }
    form {
      background-color: #fff;
      padding: 1rem;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    label {
      font-weight: bold;
    }
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 0.5rem;
      margin-top: 0.5rem;
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    input[type="radio"] {
      margin: 0 0.5rem 0 0;
    }
    input[type="submit"] {
      background-color: #3498db;
      color: #fff;
      padding: 0.7rem 1.2rem;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #2980b9;
    }
    .error {
      background-color: #fdd;
      border: 1px solid #f99;
      color: #900;
      padding: 0.5rem;
      margin-bottom: 1rem;
      border-radius: 4px;
    }
  </style>
</head>
<body>

  <h1>Login Page</h1>

  <!-- If there is an error, display it -->
  <?php if ($error_message): ?>
    <div class="error"><?php echo $error_message; ?></div>
  <?php endif; ?>

  <form action="action.php" method="post">
    <label for="id_username">Username:</label>
    <input 
      type="text" 
      id="id_username" 
      name="username" 
      value="<?php echo isset($old_data['username']) ? htmlspecialchars($old_data['username']) : ''; ?>"
    >

    <label for="id_password">Password:</label>
    <input 
      type="password" 
      id="id_password" 
      name="password"
    >

    <label>Gender:</label>
    <input 
      type="radio" 
      id="gender_male" 
      name="gender" 
      value="male" 
      <?php echo (isset($old_data['gender']) && $old_data['gender'] === 'male') ? 'checked' : ''; ?>
    >
    <label for="gender_male">Male</label>

    <input 
      type="radio" 
      id="gender_female" 
      name="gender" 
      value="female" 
      <?php echo (isset($old_data['gender']) && $old_data['gender'] === 'female') ? 'checked' : ''; ?>
    >
    <label for="gender_female">Female</label>
    <br><br>

    <input type="submit" value="Submit">
  </form>

</body>
</html>
```

---

## 9. Clearing the Session (unset) and Security

- We are already using `unset($_SESSION['errors'])` and `unset($_SESSION['old_data'])` to remove the session messages after displaying them.  
- As an additional security measure, we use `htmlspecialchars()` for outputs like username and gender, preventing HTML injection.

(This is already done in the code above. Typically, for real-world applications, we also never store the password in `$_SESSION['old_data']` nor in the HTML.)

---

## 10. Additional Styling

- If you want, you can add more styles:
  - A border around the form,
  - Different background colors,  
  - Button animations, etc.

For example, we already have a hover effect on the button. We could add a `transition: 0.3s;` for a smoother change:

```css
input[type="submit"] {
  background-color: #3498db;
  color: #fff;
  padding: 0.7rem 1.2rem;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s; /* Add a transition */
}
```

---

# Full **Working Code Example** (Two Files)

Below is everything needed for the task to work. Remember to save these files in the **same folder** and run them via a PHP server (e.g., XAMPP, MAMP, WAMP, or the built-in PHP server).

---

### **index.php**
```php
<?php
session_start();
$error_message = isset($_SESSION['errors']) ? $_SESSION['errors'] : '';
unset($_SESSION['errors']);
$old_data = isset($_SESSION['old_data']) ? $_SESSION['old_data'] : [];
unset($_SESSION['old_data']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <style>
    body {
      background-color: #f7f7f7;
      font-family: Arial, sans-serif;
      max-width: 500px;
      margin: auto;
      padding: 1rem;
    }
    form {
      background-color: #fff;
      padding: 1rem;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    label {
      font-weight: bold;
    }
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 0.5rem;
      margin-top: 0.5rem;
      margin-bottom: 1rem;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    input[type="radio"] {
      margin-right: 0.5rem;
    }
    input[type="submit"] {
      background-color: #3498db;
      color: #fff;
      padding: 0.7rem 1.2rem;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    input[type="submit"]:hover {
      background-color: #2980b9;
    }
    .error {
      background-color: #fdd;
      border: 1px solid #f99;
      color: #900;
      padding: 0.5rem;
      margin-bottom: 1rem;
      border-radius: 4px;
    }
  </style>
</head>
<body>

  <h1>Login Page</h1>

  <?php if ($error_message): ?>
    <div class="error"><?php echo $error_message; ?></div>
  <?php endif; ?>

  <form action="action.php" method="post">
    <label for="id_username">Username:</label>
    <input 
      type="text" 
      id="id_username" 
      name="username" 
      value="<?php echo isset($old_data['username']) ? htmlspecialchars($old_data['username']) : ''; ?>"
    >

    <label for="id_password">Password:</label>
    <input 
      type="password" 
      id="id_password" 
      name="password"
    >

    <label>Gender:</label>
    <input 
      type="radio" 
      id="gender_male" 
      name="gender" 
      value="male" 
      <?php echo (isset($old_data['gender']) && $old_data['gender'] === 'male') ? 'checked' : ''; ?>
    >
    <label for="gender_male">Male</label>

    <input 
      type="radio" 
      id="gender_female" 
      name="gender" 
      value="female" 
      <?php echo (isset($old_data['gender']) && $old_data['gender'] === 'female') ? 'checked' : ''; ?>
    >
    <label for="gender_female">Female</label>

    <br><br>
    <input type="submit" value="Submit">
  </form>

</body>
</html>
```

---

### **action.php**
```php
<?php
session_start(); // Start the session so we can use $_SESSION

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';
$gender   = isset($_POST['gender'])   ? trim($_POST['gender'])   : '';

$missing_fields = [];

// Check for empty fields
if ($username === '') {
    $missing_fields[] = 'Username';
}
if ($password === '') {
    $missing_fields[] = 'Password';
}
if ($gender === '') {
    $missing_fields[] = 'Gender';
}

// If there are missing fields:
if (!empty($missing_fields)) {
    $_SESSION['errors'] = "The following fields are required: " . implode(', ', $missing_fields);
    // Store what the user entered (excluding the password)
    $_SESSION['old_data'] = [
        'username' => $username,
        'gender'   => $gender
    ];
    header("Location: index.php");
    exit();
}

// Example users and passwords
$users = [
  'admin' => 'admin123',
  'user1' => 'mypassword'
];

// Check if the username is in the array and the password matches
if (array_key_exists($username, $users) && $users[$username] === $password) {
    // Correct username and password
    echo "Hello, " . htmlspecialchars($username) . "!<br>";
    echo "You have successfully logged in.<br>";
    echo "Your gender: " . htmlspecialchars($gender);
} else {
    // Incorrect username or password
    $_SESSION['errors'] = "Incorrect username or password.";
    $_SESSION['old_data'] = [
        'username' => $username,
        'gender'   => $gender
    ];
    header("Location: index.php");
    exit();
}
```

---

## How does it work?

1. **Opening `index.php`**  
   - When you open `index.php`, you see the **HTML form** where you need to enter your username, password, and gender.  
   - If there was an error in a previous request (for example, empty fields or a wrong password), that information (the error message and any previously entered data) is stored in the `$_SESSION` array and displayed on the page so the user **doesn’t have to re-enter** everything from scratch.

2. **Submitting the Form**  
   - When the user enters data and clicks “Submit,” the browser sends that information to `action.php` (because the form uses `action="action.php"` and `method="post"`).

3. **`action.php` and Session Data**  
   - In `action.php`, we begin with `session_start()`, so we can read and write data in the `$_SESSION` array.  
   - We then read the submitted fields (username, password, gender) and check whether they are empty. If a field is empty, we add it to a list of missing fields.  
   - If that list **is not empty**, it means there were unfilled (missing) fields. In that case:  
     1. We store an error message in `$_SESSION['errors']`.  
     2. We store the entered data (except the password) in `$_SESSION['old_data']`, so the user sees it when returning to the form.  
     3. We use `header("Location: index.php")` to redirect the user back to the form.  
   - If all fields are filled, we then check the username and password.  
     - If the password is correct, we display a welcome message (or perform another action, like redirecting to “admin.php”).  
     - If the password is incorrect, we store an error in `$_SESSION['errors']`, also store the user’s input (except the password), and redirect back to the form with `header("Location: index.php")`.

4. **Returning to `index.php`**  
   - `index.php` again calls `session_start()`, so it can access `$_SESSION['errors']` and `$_SESSION['old_data']`.  
   - The error message is displayed (if it exists), and the text fields and radio buttons get their previously typed values, making it easier for the user to correct their input.  
   - After displaying, we use `unset($_SESSION['errors'], $_SESSION['old_data'])` so that the old messages and data don’t stick around for the next load.

---

## About Storing Passwords and Using `password_hash` / `password_verify`

In real applications, passwords are **never** stored in plain text (e.g., `admin123`). This is a security risk because:
- If someone hacks your database or file with the passwords, they can read them in plain text.  
- If the user reuses the same password on many sites, a hacker can access those other sites as well.

PHP offers functions that make password storage more secure:
1. **`password_hash($plainTextPassword, PASSWORD_DEFAULT)`**  
   - Generates a secure, one-way hash value with a built-in “salt.”  
   - The hash is a long, seemingly random string from which the original password cannot practically be retrieved.  
   - `PASSWORD_DEFAULT` ensures PHP uses the latest recommended algorithm (currently bcrypt, which may change in the future).

2. **`password_verify($plainTextPassword, $hashedPasswordFromDb)`**  
   - Compares the user’s entered password with the hash stored in the database.  
   - Returns `true` if they match, `false` otherwise.  
   - This way, you never have to store or compare plain text passwords.

### What does this mean in practice?
- When a user registers, you store the **hashed** password in the database, not the plain text version.
- When the user logs in:
  1. They enter their password.  
  2. You fetch the hashed password from the database for that username.  
  3. Use `password_verify(entered_password, hashed_password_from_db)`.  
  4. If `true`, the password is correct; if `false`, it’s incorrect.

**Why is this more secure?**  
Even if an attacker steals your database, they only see hashed values, which aren’t easily “de-hashed.” Modern hashing algorithms (bcrypt, Argon2, etc.) make it computationally very expensive to guess or reverse-engineer the original passwords from the hashes.