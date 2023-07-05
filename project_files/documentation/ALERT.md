# Alert Display

### Step 1 (Including Sources):

 1. Include css link `<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">` into your layout file (app.blade.php).
 2. Include JS link `<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>` into your layout file (app.blade.php).
 3. Include Following Lines bottom of you layout file inside body tag: 
 ```php
@php
    use App\Services\Alert;
    Alert::display();
@endphp
```

### Step 2 (Calling Alert):
Call Alert like following:

 ```php
use App\Services\Alert;

Alert::success('Your Message Here');
```

> **Alert Types:** success, error/danger, info, warning
