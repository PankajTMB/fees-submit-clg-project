<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fees Submit Form</title>
        <link rel="stylesheet" href="fonts/stylesheet.css">
        <link rel="stylesheet" href="style.css">
        <script src="javascript.js" defer></script>
    </head>
    <body>
        <div class="form__wrapper">
            <form class="fees__submit" id="feesSubmitForm" >
                <div class="form__header">
                    <h2 class="form__heading">
                        Check Student Data
                    </h2>
                </div>
                <div class="form__content">
                    <input type="number" name="rollno" id="fetchRollnoData" class="form__control" placeholder="ENTER ROLL NUMBER">
                    <div class="btn__wrap">
                        <button class="form__submit__btn" name='submit' type="submit">
                            SUBMIT
                        </button>
                    </div>
                </div>
            </form>
            
        </div>
        <div id="requestResponse"></div>
        <div class="form__wrapper">
            <form class="fees__deposite" id="feesDeposite" >
                <div class="form__header">
                    <h2 class="form__heading">
                        Fees Deoposite
                    </h2>
                </div>
                <div class="form__content">
                    <input type="number"  name="depositeFeesRollNo" class="form__control"  >
                    <input type="number" name="depositeFees" class="form__control" placeholder="Enter Deposite Fees Amount">
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