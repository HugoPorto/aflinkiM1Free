<style>
    a:link {
    text-decoration:none;
    }
    a:visited {
    text-decoration:none;
    }

    .generator {
        font-family: sans-serif;
        width: 100%;
        margin: 0 auto;
        box-sizing: border-box;
    }

    #title {
        text-align: center;
        color: black;
    }

    .container-input {
        max-width: 480px;
        margin: 14px 0;
    }

    .container-input span {
        color: black;
        font-size: 22px;
    }

    .slider {
        width: 100%;
        -webkit-appearance: none;
        border-radius: 5px;
        background-color: #dfdfdf;
        height: 18px;
        outline: none;
        margin-top: 8px;
    }

    .button-cta {
        height: 40px;
        background-color: #00FF00;
        border: 0;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 40px;
        color: white;
        font-weight: bold;
        font-size: 18px;
    }

    .container-password {
        max-width: 480px;
        margin: 14px 0;
        display: flex;
        align-items: center;
        flex-direction: column;
        cursor: pointer;
    }

    .title {
        text-align: center;
        color: black;
        font-size: 28px;
        margin-top: 24px;
        margin-bottom: 8px;
    }

    .password {
        height: 60px;
        background-color: rgba(0, 0, 0, 0.40);
        border-radius: 4px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        border: 1px solid #313131;
        transition: transform 0.5s;
    }

    .password:hover {
        transform: scale(1.05);
    }

    .tooltip {
        color: white;
        position: relative;
        top: 20px;
        padding: 6px 8px;
        text-align: center;
        background-color: rgb(15, 15, 15);
        font-size: 16px;
        border-radius: 6px;
        visibility: hidden;
        opacity: 0;
        transition: all 0.5 ease-in-out;
    }

    .container-password:hover .tooltip {
        visibility: visible;
        bottom: 50px;
        opacity: 1;
    }

    .hide {
        display: none;
    }

    .logo{
        width: 200px;
        margin-bottom: 20px;
    }

    .info{
        text-align: center;
        margin-bottom: 10px;
    }

    <?php if ($this->request->action == 'passGenerator') : ?>
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100px;    
            text-align: center;
            line-height: 100px;
        }
    <?php endif; ?>
</style>
