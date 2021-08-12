
# sylius-payzen-plugin
Plugin for card payment gateway on sylius

<p align="center">
    <a href="https://sylius.com" target="_blank">
        <img src="https://demo.sylius.com/assets/shop/img/logo.png" />
    </a>
</p>
<p align="center">
    <a href="https://dalvin.eu" target="_blank">
        <img src="https://media-exp1.licdn.com/dms/image/C4D0BAQHlHMaOMOrSMA/company-logo_200_200/0/1546956636847?e=2159024400&v=beta&t=M6txRAzvRBslQr-P7C-w1ba5_ZwKqijscP0PyUhj2dQ" />
    </a>
</p>
<h1 align="center">Payzen Plugin</h1>

<p align="center">Sylius Plugin for integrate Payzen card form payment.</p>
 


## Quickstart Installation
- Install with `composer`:

  
  `composer require dalvintech/sylius-payzen-plugin "dev-main"`
  

- Create `template`:
  

  You should copy all directory or files in `src/Resources/view` and paste into your `templates` directory of your app.
## Usage
This plugin add a new payment method for CardPayment via Payzen Gateway.
The form is embed in your store , no redirection.
### Test : Opening Sylius with your plugin

- Using `test` environment:

    ```bash
    (cd tests/Application && APP_ENV=test bin/console sylius:fixtures:load)
    (cd tests/Application && APP_ENV=test bin/console server:run -d public)
    ```
    
- Using `dev` environment:

    ```bash
    (cd tests/Application && APP_ENV=dev bin/console sylius:fixtures:load)
    (cd tests/Application && APP_ENV=dev bin/console server:run -d public)
    ```

