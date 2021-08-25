<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Addmision Form</title>
        <link rel="stylesheet" href="fonts/stylesheet.css">
        <link rel="stylesheet" href="style.css">
        <script src="javascript.js" defer></script>
    </head>
    <body>
        <div class="form__wrapper">
            <form class="addmision__form" id="addmisionForm" >
                <div class="form__header">
                    <h2 class="form__heading">
                        Addmision Form
                    </h2>
                </div>
                <div class="form__content">
                    <input required type="text" name="Name" class="form__control" placeholder="Name">
                    <div class="gender form__control">
                        <div class="male">
                            <input type="radio" name="gender" value="male" id="male" checked> <label for="male">male</label>
                        </div>
                        <div class="female">
                            <input type="radio" name="gender" value="female" id="female"> <label for="female">female</label>
                        </div>
                        <div class="other">
                            <input type="radio" name="gender" value="othergender" id="othergender"> <label for="othergender">Other</label>
                        </div>
                    </div>
                    <input required type="text" name="Fname" class="form__control" placeholder="Father Name">
                    <input  required type="text" name="Mname" class="form__control" placeholder="Mother Name">
                    <input  type="Email" name="Email" class="form__control" placeholder="Email">
                    <input required type="number" name="mobile" class="form__control" placeholder="Mobile"  >
                    <input required type="number" name="mobile2" class="form__control" placeholder="Mobile" >
                    <select name="className"  class="form__control">
                        <option value="BCA">BCA</option>
                        <option value="BA">BA</option>
                        <option value="BCOM">BCOM</option>
                    </select>
                    <select name="classyear"  class="form__control">
                        <option value="year1">1st year</option>
                        <option value="year2">2nd year</option>
                        <option value="year3">3rd year</option>
                    </select>
                    <div class="btn__wrap">
                        <button class="form__submit__btn" name='submit' type="submit">
                            SUBMIT
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>