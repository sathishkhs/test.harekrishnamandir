<style>
  .the-tech-area:before {
    background-image: url(assets/images/shape/shape-donate.jpg);
    width: 755px;
  }

  .the-tech-area .the-tech-title {
    background-image: url();

  }

  #form-section {
    background: #f7f7f7;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
    padding: 20px;
    position: relative;
    /* left: 20px; */
    z-index: 9;
    margin: 80px 0;
  }
  .the-tech-area .the-tech-box .the-tech-item:hover{
    box-shadow: none ;
  }
  .the-tech-area .the-tech-box .the-tech-item {
    border: 0;
  }
  .the-tech-box{
    background-color: transparent;
  }

  .the-tech-right:before{
    content: '';
    display: block;
    position: absolute;
    background:#fff;
    width: 250px;
    height: 100%;
    left: -250px;
  }
</style>

<style type="text/css">
  .UI-form.UI-form {
    position: relative;
    color: #515978;
  }

  .UI-form.UI-form.Form--inactive .Field-content {
    opacity: 0.5;
    cursor: not-allowed;
  }

  .UI-form.UI-form.Form--inactive .Field-content .Field-el {
    pointer-events: none;
  }

  .UI-form.UI-form .Field {
    position: relative;
    display: block;
    margin: 24px 0 -21px;
    transition: 0.12s;
  }

  .UI-form.UI-form .Field::after {
    content: '';
    display: table;
    clear: both;
  }

  .UI-form.UI-form .Field--small .Field-wrapper {
    width: 55%;
  }

  .UI-form.UI-form .Field .Field .Field-error,
  .UI-form.UI-form .Field .Field .Field-description {
    display: none;
  }

  .UI-form.UI-form .Field-wrapper {
    position: relative;
    height: 36px;
    min-width: 160px;
    max-width: 360px;
    color: #0d2366;
  }

  .UI-form.UI-form .Field-wrapper .Field-el label {
    line-height: 36px;
  }

  .UI-form.UI-form .Field-addon {
    position: absolute;
    top: 0;
    display: table;
    height: 100%;
  }

  .UI-form.UI-form .Field-addon>* {
    display: table-cell;
    vertical-align: middle;
  }

  .UI-form.UI-form .Field-addon>*>.Field-content {
    margin: 0;
  }

  .UI-form.UI-form .Field--amount div.Field-el {
    pointer-events: none;
  }

  .UI-form.UI-form .Field--amount div.Field-el,
  .UI-form.UI-form .Field--amount input.Field-el {
    background: #fcfcfc;
    border: 1px solid #e3e9eb;
  }

  .UI-form.UI-form .Field--amount--error div.Field-el,
  .UI-form.UI-form .Field--amount--error input.Field-el {
    background: #fffcfc;
    border: 1px solid #fcdada;
  }

  .UI-form.UI-form .Field-error {
    color: #f05050;
    opacity: 0;
    transition: 0.12s;
    min-height: 20px;
  }

  .UI-form.UI-form .Field-description {
    transform: translateY(-21px);
    transition: 0.12s;
    overflow-wrap: break-word;
  }

  .UI-form.UI-form .Field-error,
  .UI-form.UI-form .Field-description {
    font-size: 12px;
    margin: 4px 0;
    line-height: 16px;
  }

  .UI-form.UI-form .Field-addon--after {
    right: 9px;
  }

  .UI-form.UI-form .Field-addon--before {
    left: 10px;
    font-size: 14px;
    font-weight: bold;
  }

  .UI-form.UI-form .Field-addon--after--CheckBox {
    width: 100%;
    right: 0;
  }

  .UI-form.UI-form .Field-addon--after--CheckBox .Field--CheckBox {
    text-align: right;
  }

  .UI-form.UI-form .Field-addon--after--CheckBox .Field--CheckBox .Field-wrapper {
    height: 36px;
  }

  .UI-form.UI-form .Field-addon--after--CheckBox .Field--CheckBox .Field-wrapper .Field-el {
    display: block;
    line-height: 36px;
    background: transparent;
  }

  .UI-form.UI-form .Field-addon--after--CheckBox .Field--CheckBox .Field-wrapper .CheckBox-mark {
    margin-right: 9px;
  }

  .UI-form.UI-form .Field--currency-1 .Field-addon--before+.Field-el {
    padding-left: 20px;
  }

  .UI-form.UI-form .Field--currency-2 .Field-addon--before+.Field-el {
    padding-left: 30px;
  }

  .UI-form.UI-form .Field--currency-3 .Field-addon--before+.Field-el {
    padding-left: 40px;
  }

  .UI-form.UI-form .Field--currency-4 .Field-addon--before+.Field-el {
    padding-left: 50px;
  }

  .UI-form.UI-form .Field--currency-long .Field-addon--before+.Field-el {
    padding-left: 54px;
  }

  .UI-form.UI-form .Field-addon>span>* {
    display: inline-block;
    vertical-align: middle;
  }

  .UI-form.UI-form .Field--has-image img {
    height: 34px;
    margin-left: -9px;
    margin-top: 1px;
    margin-right: 4px;
    border-bottom-left-radius: 1px;
    border-top-left-radius: 1px;
    border-right: 1px solid #e3e9eb;
  }

  .UI-form.UI-form .Field--has-image.Field--currency-1 .Field-addon--before+.Field-el {
    padding-left: 54px;
  }

  .UI-form.UI-form .Field--has-image.Field--currency-2 .Field-addon--before+.Field-el {
    padding-left: 64px;
  }

  .UI-form.UI-form .Field--has-image.Field--currency-3 .Field-addon--before+.Field-el {
    padding-left: 74px;
  }

  .UI-form.UI-form .Field--has-image.Field--currency-4 .Field-addon--before+.Field-el {
    padding-left: 84px;
  }

  .UI-form.UI-form .Field--has-image.Field--currency-long .Field-addon--before+.Field-el {
    padding-left: 94px;
  }

  .UI-form.UI-form .Field--amount--selected div.Field-el,
  .UI-form.UI-form .Field--amount--selected input.Field-el {
    background: #fcfdff;
    border: 1px solid #dae7fc;
  }

  .UI-form.UI-form .Field--amount--selected img {
    border-color: #dae7fc;
  }

  .UI-form.UI-form .Field-el {
    line-height: 16px;
    height: 100%;
    width: 100%;
    background: #fff;
    border: 1px solid #e2e2e2;
    border-radius: 2px;
    overflow: hidden;
    font-size: 14px;
    padding: 0 9px;
    outline: none;
    color: inherit;
  }

  .UI-form.UI-form .Field-el::placeholder {
    color: rgba(0, 0, 0, 0.3);
  }

  .UI-form.UI-form .Field.has-error {
    margin-bottom: 0;
  }

  .UI-form.UI-form .Field.has-error .Field-el {
    border-color: #f05050;
  }

  .UI-form.UI-form .Field.has-error .Field-error {
    opacity: 1;
  }

  .UI-form.UI-form .Field.has-error .Field-error+.Field-description {
    transform: translateY(0);
  }

  .UI-form.UI-form .Field--disabled .Field-el {
    cursor: not-allowed;
  }

  .UI-form.UI-form .Field:not(.Field--disabled) .Field-el:hover {
    border-color: #c1c1c1;
  }

  .UI-form.UI-form .Field:not(.Field--disabled) .Field-el:focus {
    border-color: #528ff0;
  }

  .UI-form.UI-form .Field--select select {
    -webkit-appearance: none;
    -webkit-border-radius: 2px;
    -moz-appearance: none;
    text-indent: 0.001px;
    text-overflow: '';
    cursor: pointer;
  }

  .UI-form.UI-form .Field--select .Field-wrapper::before {
    content: '';
    position: absolute;
    right: 12px;
    margin-top: 15px;
    width: 0;
    height: 0;
    border-top: 4px dashed;
    border-right: 4px solid transparent;
    border-left: 4px solid transparent;
    pointer-events: none;
    z-index: 2;
  }

  .UI-form.UI-form .Field--textarea .Field-wrapper {
    height: auto;
    font-size: 0;
  }

  .UI-form.UI-form .Field--textarea textarea.Field-el {
    padding: 8px 12px;
    height: 32px;
    min-height: 32px;
    max-height: 230px;
    line-height: 16px;
    resize: vertical;
  }

  .UI-form.UI-form .Field--textarea .Field-el--textarea-fake {
    width: 100%;
    height: 32px;
    overflow: hidden;
    padding: 0 16px 0 10px;
    line-height: 20px;
    font-size: 14px;
    visibility: hidden;
    position: absolute;
    left: 0;
  }

  .UI-form.UI-form .Field-label {
    position: relative;
    float: left;
    width: 140px;
    font-size: 14px;
    line-height: 20px;
    color: #515978;
    word-break: break-word;
  }

  .UI-form.UI-form .Field-label .text-optional {
    font-size: 12px;
    opacity: 0.7;
  }

  .UI-form.UI-form .Field .symbol--red {
    color: #f05050;
    display: none;
  }

  .UI-form.UI-form .Field--required .symbol--red {
    display: inline-block;
  }

  .UI-form.UI-form .Field-content {
    margin-left: 164px;
  }

  .UI-form.UI-form .Field--CheckBox {
    font-size: 0;
  }

  .UI-form.UI-form .Field--CheckBox .Field-wrapper {
    min-width: unset;
    max-width: unset;
  }

  .UI-form.UI-form .Field--CheckBox .Field-el {
    font-size: 0;
  }

  .UI-form.UI-form .Field--CheckBox .CheckBox-mark {
    margin: 0;
    width: 18px;
    height: 18px;
  }

  .UI-form.UI-form .Field--CheckBox .CheckBox-mark::after {
    margin: 4px 0 0 7px;
  }

  .UI-form.UI-form .Field--counter .Field-label {
    margin-bottom: 0;
  }

  .UI-form.UI-form .Field--counter .Field-wrapper {
    min-width: 96px;
    max-width: 96px;
    height: 24px;
  }

  .UI-form.UI-form .Field--counter .Field-wrapper button {
    position: absolute;
    width: 28px;
    height: 22px;
    font-size: 20px;
    background: transparent;
    padding: 0 0 3px 1px;
    user-select: none;
    outline: 0;
    -webkit-tap-highlight-color: transparent;
    cursor: pointer;
    top: 0;
    line-height: 100%;
    font-weight: bold;
  }

  .UI-form.UI-form .Field--counter .Field-wrapper button:disabled,
  .UI-form.UI-form .Field--counter .Field-wrapper button[disabled] {
    opacity: 0.3;
    cursor: not-allowed;
  }

  .UI-form.UI-form .Field--counter .Field-wrapper button:hover {
    background: #f6f6f6;
  }

  .UI-form.UI-form .Field--counter .Field-wrapper button:active {
    background: #e3e3e3;
  }

  .UI-form.UI-form .Field--counter .Field-wrapper button:nth-of-type(1) {
    left: 0;
    border-top-left-radius: 1px;
    border-bottom-left-radius: 1px;
    border: none;
    border-right: 1px solid #e2e2e2;
    margin: 1px 0 0 1px;
  }

  .UI-form.UI-form .Field--counter .Field-wrapper button:nth-of-type(2) {
    right: 0;
    border-top-right-radius: 1px;
    border-bottom-right-radius: 1px;
    border: none;
    border-left: 1px solid #e2e2e2;
    margin: 1px 1px 0 0;
  }

  .UI-form.UI-form .Field--counter .Field-wrapper .counter-value {
    width: 100%;
    padding: 0 32px;
    display: block;
    text-align: center;
    background: #fff;
  }

  .UI-form.UI-form .Field-el[type=number]::-webkit-inner-spin-button,
  .UI-form.UI-form .Field-el[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    -moz-appearance: textfield;
    margin: 0;
  }

  .UI-form.UI-form .currency-symbol {
    margin-top: 2px;
  }

  @media (max-width: 1024px) {
    .UI-form.UI-form .Field {
      margin-top: 24px;
    }

    .UI-form.UI-form .Field-label {
      width: 100%;
      margin-bottom: 4px;
      text-align: left;
      float: unset;
    }

    .UI-form.UI-form .Field-label .text-optional {
      margin-left: 4px;
      display: inline-block;
    }

    .UI-form.UI-form .Field-content {
      margin-left: 0;
    }

    .UI-form.UI-form .Field-wrapper {
      height: 40px;
      max-width: unset;
    }

    .UI-form.UI-form .Field-wrapper div.Field-el {
      line-height: 40px;
    }

    .UI-form.UI-form .Field-wrapper .Field--CheckBox .Field-wrapper {
      height: 40px;
      line-height: 40px;
    }

    .UI-form.UI-form .Field-wrapper .Field--CheckBox .CheckBox-mark {
      width: 21px;
      height: 21px;
    }

    .UI-form.UI-form .Field-wrapper .Field--CheckBox .CheckBox-mark::after {
      margin: 6px 0 0 8px;
    }

    .UI-form.UI-form .Field--textarea textarea.Field-el {
      height: 40px;
      min-height: 40px;
      line-height: 20px;
    }

    .UI-form.UI-form .Field--select select {
      -webkit-appearance: none;
      -webkit-border-radius: 2px;
      cursor: pointer;
    }

    .UI-form.UI-form .Field--select .Field-wrapper::before {
      margin-top: 18px;
    }

    .UI-form.UI-form .Field--has-image img {
      height: 38px;
    }

    .UI-form.UI-form .Field--has-image.Field--currency-1 .Field-addon--before+.Field-el {
      padding-left: 58px;
    }

    .UI-form.UI-form .Field--has-image.Field--currency-2 .Field-addon--before+.Field-el {
      padding-left: 68px;
    }

    .UI-form.UI-form .Field--has-image.Field--currency-3 .Field-addon--before+.Field-el {
      padding-left: 78px;
    }

    .UI-form.UI-form .Field--has-image.Field--currency-4 .Field-addon--before+.Field-el {
      padding-left: 88px;
    }

    .UI-form.UI-form .Field--has-image.Field--currency-long .Field-addon--before+.Field-el {
      padding-left: 98px;
    }
  }
</style>

<style type="text/css">
  .Field.Field--CheckBox {
    display: block;
    cursor: pointer;
  }

  .Field.Field--CheckBox .Field-el {
    border: none;
    padding: 0;
    cursor: inherit;
  }

  .Field.Field--CheckBox .Field-el:active {
    border: none;
  }

  .Field.Field--CheckBox.Field--disabled {
    cursor: not-allowed;
    opacity: 0.6;
  }

  .Field.Field--CheckBox .CheckBox-mark,
  .Field.Field--CheckBox .CheckBox-left {
    vertical-align: middle;
    display: inline-block;
  }

  .Field.Field--CheckBox .CheckBox-mark {
    width: 14px;
    height: 14px;
    border-radius: 1px;
    border: 1px solid #cad1d9;
    background-color: #fff;
    position: relative;
    vertical-align: middle;
    margin-right: 4px;
  }

  .Field.Field--CheckBox .CheckBox-mark::after {
    content: '';
    position: absolute;
    color: #fff;
    transition: 0.12s ease-in;
    opacity: 0;
    display: block;
    width: 2px;
    height: 5px;
    border: solid #fff;
    border-width: 0 1px 1px 0;
    transform: rotate(45deg);
    margin: 2px 0 0 5px;
  }

  .Field.Field--CheckBox [type="checkbox"]:checked+.CheckBox-mark {
    background-color: #429cff;
    border-color: rgba(0, 0, 0, 0.05);
  }

  .Field.Field--CheckBox [type="checkbox"]:checked+.CheckBox-mark:after {
    opacity: 1;
    transform: rotate(45deg) scale(1.5);
  }

  .Field.Field--CheckBox .CheckBox-label {
    font-size: 13px;
    line-height: 16px;
  }
</style>
<style type="text/css">
  .flatpickr-calendar {
    background: transparent;
    opacity: 0;
    display: none;
    text-align: center;
    visibility: hidden;
    padding: 0;
    animation: none;
    direction: ltr;
    border: 0;
    font-size: 14px;
    line-height: 24px;
    border-radius: 5px;
    position: absolute;
    width: 307.875px;
    box-sizing: border-box;
    touch-action: manipulation;
    background: #fff;
    box-shadow: 1px 0 0 #eee, -1px 0 0 #eee, 0 1px 0 #eee, 0 -1px 0 #eee, 0 3px 13px rgba(0, 0, 0, 0.08);
  }

  .flatpickr-calendar.open,
  .flatpickr-calendar.inline {
    opacity: 1;
    max-height: 640px;
    visibility: visible;
  }

  .flatpickr-calendar.open {
    display: inline-block;
    z-index: 99999;
  }

  .flatpickr-calendar.animate.open {
    animation: fpFadeInDown 300ms cubic-bezier(0.23, 1, 0.32, 1);
  }

  .flatpickr-calendar.inline {
    display: block;
    position: relative;
    top: 2px;
  }

  .flatpickr-calendar.static {
    position: absolute;
    top: calc(100% + 2px);
  }

  .flatpickr-calendar.static.open {
    z-index: 999;
    display: block;
  }

  .flatpickr-calendar.multiMonth .flatpickr-days .dayContainer:nth-child(n+1) .flatpickr-day.inRange:nth-child(7n+7) {
    box-shadow: none !important;
  }

  .flatpickr-calendar.multiMonth .flatpickr-days .dayContainer:nth-child(n+2) .flatpickr-day.inRange:nth-child(7n+1) {
    box-shadow: -2px 0 0 #e6e6e6, 5px 0 0 #e6e6e6;
  }

  .flatpickr-calendar .hasWeeks .dayContainer,
  .flatpickr-calendar .hasTime .dayContainer {
    border-bottom: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }

  .flatpickr-calendar .hasWeeks .dayContainer {
    border-left: 0;
  }

  .flatpickr-calendar.showTimeInput.hasTime .flatpickr-time {
    height: 40px;
    border-top: 1px solid #eee;
  }

  .flatpickr-calendar.noCalendar.hasTime .flatpickr-time {
    height: auto;
  }

  .flatpickr-calendar:before,
  .flatpickr-calendar:after {
    position: absolute;
    display: block;
    pointer-events: none;
    border: solid transparent;
    content: '';
    height: 0;
    width: 0;
    left: 22px;
  }

  .flatpickr-calendar.rightMost:before,
  .flatpickr-calendar.rightMost:after {
    left: auto;
    right: 22px;
  }

  .flatpickr-calendar:before {
    border-width: 5px;
    margin: 0 -5px;
  }

  .flatpickr-calendar:after {
    border-width: 4px;
    margin: 0 -4px;
  }

  .flatpickr-calendar.arrowTop:before,
  .flatpickr-calendar.arrowTop:after {
    bottom: 100%;
  }

  .flatpickr-calendar.arrowTop:before {
    border-bottom-color: #eee;
  }

  .flatpickr-calendar.arrowTop:after {
    border-bottom-color: #fff;
  }

  .flatpickr-calendar.arrowBottom:before,
  .flatpickr-calendar.arrowBottom:after {
    top: 100%;
  }

  .flatpickr-calendar.arrowBottom:before {
    border-top-color: #eee;
  }

  .flatpickr-calendar.arrowBottom:after {
    border-top-color: #fff;
  }

  .flatpickr-calendar:focus {
    outline: 0;
  }

  .flatpickr-wrapper {
    position: relative;
    display: inline-block;
  }

  .flatpickr-months {
    display: flex;
  }

  .flatpickr-months .flatpickr-month {
    background: transparent;
    color: #3c3f40;
    fill: #3c3f40;
    height: 28px;
    line-height: 1;
    text-align: center;
    position: relative;
    user-select: none;
    overflow: hidden;
    flex: 1;
  }

  .flatpickr-months .flatpickr-prev-month,
  .flatpickr-months .flatpickr-next-month {
    text-decoration: none;
    cursor: pointer;
    position: absolute;
    top: 0px;
    line-height: 16px;
    height: 28px;
    padding: 10px;
    z-index: 3;
    color: #3c3f40;
    fill: #3c3f40;
  }

  .flatpickr-months .flatpickr-prev-month.disabled,
  .flatpickr-months .flatpickr-next-month.disabled {
    display: none;
  }

  .flatpickr-months .flatpickr-prev-month i,
  .flatpickr-months .flatpickr-next-month i {
    position: relative;
  }

  .flatpickr-months .flatpickr-prev-month.flatpickr-prev-month,
  .flatpickr-months .flatpickr-next-month.flatpickr-prev-month {
    /*
      /*rtl:begin:ignore*/
    /*
      */
    left: 0;
    /*
      /*rtl:end:ignore*/
    /*
      */
  }

  /*
      /*rtl:begin:ignore*/
  /*
      /*rtl:end:ignore*/
  .flatpickr-months .flatpickr-prev-month.flatpickr-next-month,
  .flatpickr-months .flatpickr-next-month.flatpickr-next-month {
    /*
      /*rtl:begin:ignore*/
    /*
      */
    right: 0;
    /*
      /*rtl:end:ignore*/
    /*
      */
  }

  /*
      /*rtl:begin:ignore*/
  /*
      /*rtl:end:ignore*/
  .flatpickr-months .flatpickr-prev-month:hover,
  .flatpickr-months .flatpickr-next-month:hover {
    color: #f64747;
  }

  .flatpickr-months .flatpickr-prev-month:hover svg,
  .flatpickr-months .flatpickr-next-month:hover svg {
    fill: #f64747;
  }

  .flatpickr-months .flatpickr-prev-month svg,
  .flatpickr-months .flatpickr-next-month svg {
    width: 14px;
    height: 14px;
  }

  .flatpickr-months .flatpickr-prev-month svg path,
  .flatpickr-months .flatpickr-next-month svg path {
    transition: fill 0.1s;
    fill: inherit;
  }

  .numInputWrapper {
    position: relative;
    height: auto;
  }

  .numInputWrapper input,
  .numInputWrapper span {
    display: inline-block;
  }

  .numInputWrapper input {
    width: 100%;
  }

  .numInputWrapper input::-ms-clear {
    display: none;
  }

  .numInputWrapper input::-webkit-outer-spin-button,
  .numInputWrapper input::-webkit-inner-spin-button {
    margin: 0;
    -webkit-appearance: none;
  }

  .numInputWrapper span {
    position: absolute;
    right: 0;
    width: 14px;
    padding: 0 4px 0 2px;
    height: 50%;
    line-height: 50%;
    opacity: 0;
    cursor: pointer;
    border: 1px solid rgba(64, 72, 72, 0.15);
    box-sizing: border-box;
  }

  .numInputWrapper span:hover {
    background: rgba(0, 0, 0, 0.1);
  }

  .numInputWrapper span:active {
    background: rgba(0, 0, 0, 0.2);
  }

  .numInputWrapper span:after {
    display: block;
    content: "";
    position: absolute;
  }

  .numInputWrapper span.arrowUp {
    top: 0;
    border-bottom: 0;
  }

  .numInputWrapper span.arrowUp:after {
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
    border-bottom: 4px solid rgba(64, 72, 72, 0.6);
    top: 26%;
  }

  .numInputWrapper span.arrowDown {
    top: 50%;
  }

  .numInputWrapper span.arrowDown:after {
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
    border-top: 4px solid rgba(64, 72, 72, 0.6);
    top: 40%;
  }

  .numInputWrapper span svg {
    width: inherit;
    height: auto;
  }

  .numInputWrapper span svg path {
    fill: rgba(60, 63, 64, 0.5);
  }

  .numInputWrapper:hover {
    background: rgba(0, 0, 0, 0.05);
  }

  .numInputWrapper:hover span {
    opacity: 1;
  }

  .flatpickr-current-month {
    font-size: 135%;
    line-height: inherit;
    font-weight: 300;
    color: inherit;
    position: absolute;
    width: 75%;
    left: 12.5%;
    padding: 6.16px 0 0 0;
    line-height: 1;
    height: 28px;
    display: inline-block;
    text-align: center;
    transform: translate3d(0px, 0px, 0px);
  }

  .flatpickr-current-month span.cur-month {
    font-family: inherit;
    font-weight: 700;
    color: inherit;
    display: inline-block;
    margin-left: 0.5ch;
    padding: 0;
  }

  .flatpickr-current-month span.cur-month:hover {
    background: rgba(0, 0, 0, 0.05);
  }

  .flatpickr-current-month .numInputWrapper {
    width: 6ch;
    width: 7ch\0;
    display: inline-block;
  }

  .flatpickr-current-month .numInputWrapper span.arrowUp:after {
    border-bottom-color: #3c3f40;
  }

  .flatpickr-current-month .numInputWrapper span.arrowDown:after {
    border-top-color: #3c3f40;
  }

  .flatpickr-current-month input.cur-year {
    background: transparent;
    box-sizing: border-box;
    color: inherit;
    cursor: text;
    padding: 0 0 0 0.5ch;
    margin: 0;
    display: inline-block;
    font-size: inherit;
    font-family: inherit;
    font-weight: 300;
    line-height: inherit;
    height: auto;
    border: 0;
    border-radius: 0;
    vertical-align: initial;
    -webkit-appearance: textfield;
    -moz-appearance: textfield;
    appearance: textfield;
  }

  .flatpickr-current-month input.cur-year:focus {
    outline: 0;
  }

  .flatpickr-current-month input.cur-year[disabled],
  .flatpickr-current-month input.cur-year[disabled]:hover {
    font-size: 100%;
    color: rgba(60, 63, 64, 0.5);
    background: transparent;
    pointer-events: none;
  }

  .flatpickr-weekdays {
    background: transparent;
    text-align: center;
    overflow: hidden;
    width: 100%;
    display: flex;
    align-items: center;
    height: 28px;
  }

  .flatpickr-weekdays .flatpickr-weekdaycontainer {
    display: flex;
    flex: 1;
  }

  span.flatpickr-weekday {
    cursor: default;
    font-size: 90%;
    background: transparent;
    color: rgba(0, 0, 0, 0.54);
    line-height: 1;
    margin: 0;
    text-align: center;
    display: block;
    flex: 1;
    font-weight: bolder;
  }

  .dayContainer,
  .flatpickr-weeks {
    padding: 1px 0 0 0;
  }

  .flatpickr-days {
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: flex-start;
    width: 307.875px;
  }

  .flatpickr-days:focus {
    outline: 0;
  }

  .dayContainer {
    padding: 0;
    outline: 0;
    text-align: left;
    width: 307.875px;
    min-width: 307.875px;
    max-width: 307.875px;
    box-sizing: border-box;
    display: inline-block;
    display: -ms-flexbox;
    display: flex;
    flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    -ms-flex-pack: justify;
    justify-content: space-around;
    transform: translate3d(0px, 0px, 0px);
    opacity: 1;
  }

  .dayContainer+.dayContainer {
    box-shadow: -1px 0 0 #eee;
  }

  .flatpickr-day {
    background: none;
    border: 1px solid transparent;
    border-radius: 150px;
    box-sizing: border-box;
    color: #404848;
    cursor: pointer;
    font-weight: 400;
    width: 14.2857143%;
    flex-basis: 14.2857143%;
    max-width: 39px;
    height: 39px;
    line-height: 39px;
    margin: 0;
    display: inline-block;
    position: relative;
    justify-content: center;
    text-align: center;
  }

  .flatpickr-day.inRange,
  .flatpickr-day.prevMonthDay.inRange,
  .flatpickr-day.nextMonthDay.inRange,
  .flatpickr-day.today.inRange,
  .flatpickr-day.prevMonthDay.today.inRange,
  .flatpickr-day.nextMonthDay.today.inRange,
  .flatpickr-day:hover,
  .flatpickr-day.prevMonthDay:hover,
  .flatpickr-day.nextMonthDay:hover,
  .flatpickr-day:focus,
  .flatpickr-day.prevMonthDay:focus,
  .flatpickr-day.nextMonthDay:focus {
    cursor: pointer;
    outline: 0;
    background: #e9e9e9;
    border-color: #e9e9e9;
  }

  .flatpickr-day.today {
    border-color: #f64747;
  }

  .flatpickr-day.today:hover,
  .flatpickr-day.today:focus {
    border-color: #f64747;
    background: #f64747;
    color: #fff;
  }

  .flatpickr-day.selected,
  .flatpickr-day.startRange,
  .flatpickr-day.endRange,
  .flatpickr-day.selected.inRange,
  .flatpickr-day.startRange.inRange,
  .flatpickr-day.endRange.inRange,
  .flatpickr-day.selected:focus,
  .flatpickr-day.startRange:focus,
  .flatpickr-day.endRange:focus,
  .flatpickr-day.selected:hover,
  .flatpickr-day.startRange:hover,
  .flatpickr-day.endRange:hover,
  .flatpickr-day.selected.prevMonthDay,
  .flatpickr-day.startRange.prevMonthDay,
  .flatpickr-day.endRange.prevMonthDay,
  .flatpickr-day.selected.nextMonthDay,
  .flatpickr-day.startRange.nextMonthDay,
  .flatpickr-day.endRange.nextMonthDay {
    background: #4f99ff;
    box-shadow: none;
    color: #fff;
    border-color: #4f99ff;
  }

  .flatpickr-day.selected.startRange,
  .flatpickr-day.startRange.startRange,
  .flatpickr-day.endRange.startRange {
    border-radius: 50px 0 0 50px;
  }

  .flatpickr-day.selected.endRange,
  .flatpickr-day.startRange.endRange,
  .flatpickr-day.endRange.endRange {
    border-radius: 0 50px 50px 0;
  }

  .flatpickr-day.selected.startRange+.endRange:not(:nth-child(7n+1)),
  .flatpickr-day.startRange.startRange+.endRange:not(:nth-child(7n+1)),
  .flatpickr-day.endRange.startRange+.endRange:not(:nth-child(7n+1)) {
    box-shadow: -10px 0 0 #4f99ff;
  }

  .flatpickr-day.selected.startRange.endRange,
  .flatpickr-day.startRange.startRange.endRange,
  .flatpickr-day.endRange.startRange.endRange {
    border-radius: 50px;
  }

  .flatpickr-day.inRange {
    border-radius: 0;
    box-shadow: -5px 0 0 #e9e9e9, 5px 0 0 #e9e9e9;
  }

  .flatpickr-day.disabled,
  .flatpickr-day.disabled:hover,
  .flatpickr-day.prevMonthDay,
  .flatpickr-day.nextMonthDay,
  .flatpickr-day.notAllowed,
  .flatpickr-day.notAllowed.prevMonthDay,
  .flatpickr-day.notAllowed.nextMonthDay {
    color: rgba(64, 72, 72, 0.3);
    background: transparent;
    border-color: #e9e9e9;
    cursor: default;
  }

  .flatpickr-day.disabled,
  .flatpickr-day.disabled:hover {
    cursor: not-allowed;
    color: rgba(64, 72, 72, 0.1);
  }

  .flatpickr-day.week.selected {
    border-radius: 0;
    box-shadow: -5px 0 0 #4f99ff, 5px 0 0 #4f99ff;
  }

  .flatpickr-day.hidden {
    visibility: hidden;
  }

  .rangeMode .flatpickr-day {
    margin-top: 1px;
  }

  .flatpickr-weekwrapper {
    display: inline-block;
    float: left;
  }

  .flatpickr-weekwrapper .flatpickr-weeks {
    padding: 0 12px;
    box-shadow: 1px 0 0 #eee;
  }

  .flatpickr-weekwrapper .flatpickr-weekday {
    float: none;
    width: 100%;
    line-height: 28px;
  }

  .flatpickr-weekwrapper span.flatpickr-day,
  .flatpickr-weekwrapper span.flatpickr-day:hover {
    display: block;
    width: 100%;
    max-width: none;
    color: rgba(64, 72, 72, 0.3);
    background: transparent;
    cursor: default;
    border: none;
  }

  .flatpickr-innerContainer {
    display: block;
    display: flex;
    box-sizing: border-box;
    overflow: hidden;
  }

  .flatpickr-rContainer {
    display: inline-block;
    padding: 0;
    box-sizing: border-box;
  }

  .flatpickr-time {
    text-align: center;
    outline: 0;
    display: block;
    height: 0;
    line-height: 40px;
    max-height: 40px;
    box-sizing: border-box;
    overflow: hidden;
    display: flex;
  }

  .flatpickr-time:after {
    content: "";
    display: table;
    clear: both;
  }

  .flatpickr-time .numInputWrapper {
    flex: 1;
    width: 40%;
    height: 40px;
    float: left;
  }

  .flatpickr-time .numInputWrapper span.arrowUp:after {
    border-bottom-color: #404848;
  }

  .flatpickr-time .numInputWrapper span.arrowDown:after {
    border-top-color: #404848;
  }

  .flatpickr-time.hasSeconds .numInputWrapper {
    width: 26%;
  }

  .flatpickr-time.time24hr .numInputWrapper {
    width: 49%;
  }

  .flatpickr-time input {
    background: transparent;
    box-shadow: none;
    border: 0;
    border-radius: 0;
    text-align: center;
    margin: 0;
    padding: 0;
    height: inherit;
    line-height: inherit;
    color: #404848;
    font-size: 14px;
    position: relative;
    box-sizing: border-box;
    -webkit-appearance: textfield;
    -moz-appearance: textfield;
    appearance: textfield;
  }

  .flatpickr-time input.flatpickr-hour {
    font-weight: bold;
  }

  .flatpickr-time input.flatpickr-minute,
  .flatpickr-time input.flatpickr-second {
    font-weight: 400;
  }

  .flatpickr-time input:focus {
    outline: 0;
    border: 0;
  }

  .flatpickr-time .flatpickr-time-separator,
  .flatpickr-time .flatpickr-am-pm {
    height: inherit;
    display: inline-block;
    float: left;
    line-height: inherit;
    color: #404848;
    font-weight: bold;
    width: 2%;
    user-select: none;
    align-self: center;
  }

  .flatpickr-time .flatpickr-am-pm {
    outline: 0;
    width: 18%;
    cursor: pointer;
    text-align: center;
    font-weight: 400;
  }

  .flatpickr-time input:hover,
  .flatpickr-time .flatpickr-am-pm:hover,
  .flatpickr-time input:focus,
  .flatpickr-time .flatpickr-am-pm:focus {
    background: #f1f1f1;
  }

  .flatpickr-input[readonly] {
    cursor: pointer;
  }

  @-moz-keyframes fpFadeInDown {
    from {
      opacity: 0;
      transform: translate3d(0, -20px, 0);
    }

    to {
      opacity: 1;
      transform: translate3d(0, 0, 0);
    }
  }

  @-webkit-keyframes fpFadeInDown {
    from {
      opacity: 0;
      transform: translate3d(0, -20px, 0);
    }

    to {
      opacity: 1;
      transform: translate3d(0, 0, 0);
    }
  }

  @-o-keyframes fpFadeInDown {
    from {
      opacity: 0;
      transform: translate3d(0, -20px, 0);
    }

    to {
      opacity: 1;
      transform: translate3d(0, 0, 0);
    }
  }

  @keyframes fpFadeInDown {
    from {
      opacity: 0;
      transform: translate3d(0, -20px, 0);
    }

    to {
      opacity: 1;
      transform: translate3d(0, 0, 0);
    }
  }

  .flatpickr-calendar {
    width: 307.875px;
  }

  .dayContainer {
    padding: 0;
    border-right: 0;
  }

  span.flatpickr-day,
  span.flatpickr-day.prevMonthDay,
  span.flatpickr-day.nextMonthDay {
    border-radius: 0 !important;
    border: 1px solid #e9e9e9;
    max-width: none;
    border-right-color: transparent;
  }

  span.flatpickr-day:nth-child(n+8),
  span.flatpickr-day.prevMonthDay:nth-child(n+8),
  span.flatpickr-day.nextMonthDay:nth-child(n+8) {
    border-top-color: transparent;
  }

  span.flatpickr-day:nth-child(7n-6),
  span.flatpickr-day.prevMonthDay:nth-child(7n-6),
  span.flatpickr-day.nextMonthDay:nth-child(7n-6) {
    border-left: 0;
  }

  span.flatpickr-day:nth-child(n+36),
  span.flatpickr-day.prevMonthDay:nth-child(n+36),
  span.flatpickr-day.nextMonthDay:nth-child(n+36) {
    border-bottom: 0;
  }

  span.flatpickr-day:nth-child(-n+7),
  span.flatpickr-day.prevMonthDay:nth-child(-n+7),
  span.flatpickr-day.nextMonthDay:nth-child(-n+7) {
    margin-top: 0;
  }

  span.flatpickr-day.today:not(.selected),
  span.flatpickr-day.prevMonthDay.today:not(.selected),
  span.flatpickr-day.nextMonthDay.today:not(.selected) {
    border-color: #e9e9e9;
    border-right-color: transparent;
    border-top-color: transparent;
    border-bottom-color: #f64747;
  }

  span.flatpickr-day.today:not(.selected):hover,
  span.flatpickr-day.prevMonthDay.today:not(.selected):hover,
  span.flatpickr-day.nextMonthDay.today:not(.selected):hover {
    border: 1px solid #f64747;
  }

  span.flatpickr-day.startRange,
  span.flatpickr-day.prevMonthDay.startRange,
  span.flatpickr-day.nextMonthDay.startRange,
  span.flatpickr-day.endRange,
  span.flatpickr-day.prevMonthDay.endRange,
  span.flatpickr-day.nextMonthDay.endRange {
    border-color: #4f99ff;
  }

  span.flatpickr-day.today,
  span.flatpickr-day.prevMonthDay.today,
  span.flatpickr-day.nextMonthDay.today,
  span.flatpickr-day.selected,
  span.flatpickr-day.prevMonthDay.selected,
  span.flatpickr-day.nextMonthDay.selected {
    z-index: 2;
  }

  .rangeMode .flatpickr-day {
    margin-top: -1px;
  }

  .flatpickr-weekwrapper .flatpickr-weeks {
    box-shadow: none;
  }

  .flatpickr-weekwrapper span.flatpickr-day {
    border: 0;
    margin: -1px 0 0 -1px;
  }

  .hasWeeks .flatpickr-days {
    border-right: 0;
  }

  /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
@media (max-width: 768px) {
  .the-tech-area {
  
  padding-top: 0px;
 
}
}
@media (min-width : 768px){
 
.Field{
  display: flex!important;
  align-items: center;;
}
.UI-form.UI-form .Field-content{
  margin-left: 20px;
}
.UI-form.UI-form .Field-wrapper{
  min-width: 190px;
  margin-top: 6px;
}
.UI-form.UI-form .Field-addon--after{
  top : -24px;
}
.UI-form.UI-form .Field-label{
  margin-left: 10px;
}
.UI-form.UI-form .Field-content{
  margin-top: 10px;

}
}
.btn-theme-colored{
  background: #f7b135;
  color: #fff;
}
.btn-theme-colored:hover{
  background: #1c92dd;
  color: #fff;
}

@media (max-width: 768px){
  .text-m-left{
    text-align: left!important;
    }
  .w-m-50{
    width: 50%!important;
  }  
  .UI-form.UI-form .Field-label{
    float:none !important;
    display: inline!important;
  }
}
</style>

<div class="container-fluid">
  <div class="row position-relative">
    <div class="col-sm-12 col-md-12 col-lg-12">
      <?php if (!empty($page_items->festival_banner) && file_exists((FESTIVAL_BANNER_PATH . $page_items->festival_banner))) { ?>
        <img src="<?php echo FESTIVAL_BANNER_PATH . $page_items->festival_banner; ?>" alt="donate-banner">
      <?php } ?>
    </div>
  </div>
</div>

<?php //print_r($page_items); exit; ?>
<section class="the-tech-area mt-40 ">
  <div class="container pt-1">
    <div class="row no-gutters">
      <div class="col-sm-12">
      
                <?php echo $page_items->top_content; ?>
      </div>

      <div class="col-lg-6">
        <div id="form-section" class="bg-light my-0">
          <form id="festival_form" action=""  class="UI-form "  method="post" enctype="multipart/form-data">
            <input type="hidden" id="storing_input" value="">
            <input type="hidden" name="amount" value="0" id="amount">
            <input type="hidden" name="donation_type" value="festival">
            <?php if($this->config->item('payment_mode') == 'test'){ ?>
              <input type="hidden" name="table_name" value="test_payments">
            <?php }else{ ?>
             <input type="hidden" name="table_name" value="payments">
            <?php } ?>
            <input type="hidden" name="slug" value="<?php echo $page_items->page_slug; ?>">
            <input type="hidden" id="festival" name="festival" value="<?php echo $page_items->festival_title; ?>">
            <input type="hidden" id="seva_name" name="seva_name[]" value="" >
            <input type="hidden" id="currency" name="currency" value="INR" >
            <div>
             
               <h6 class="mt-0 line-bottom mb-3"><?php echo $page_items->form_heading; ?></h6>
                  <p class="mb-2">Avail tax exemption under Section 80G</p>
              <!---->
              <p class="text-right text-m-left">Total Donation Amount: <b>₹ <span id="pay-amount" class="pay-amount">0</span>.00</span></b></p>
              <!---->
              <?php foreach($sevas as $key =>$seva){  ?>
              <div class="Field  Field--amount Field--currency-1 ">
              <img src="<?php echo SEVAS_PHOTO_UPLOAD_PATH. $seva->seva_image;?>" class="img-fluid img-responsive w-25 w-m-50">
                <div class="Field-label"><?php echo $seva->seva_name; ?>
                  <!-- <div class="text-optional">(Optional)</div> -->
                </div>
                <div >
                  <img src="<?php echo $page_items->seva_image;?>">
                </div>
                <div class="Field-content">
                  <div class="Field-wrapper"><span class="Field-addon Field-addon--before"><span>

                    <b class="currency-symbol">₹</b></span></span>
                    <div class="Field-el"><label><b><?php echo $seva->seva_amount;?></b>.00</label></div>
                    <span class="Field-addon Field-addon--after ">

                      <div class="Field Field--counter">
                        <div class="Field-content">
                          <div class="Field-wrapper"><button  id="decrement<?php echo $key; ?>" type="button" disabled="disabled" onclick="decrement(<?php echo $key; ?>)">-</button>
                            <input class="Field-el counter-value" type="number" seva-name="" data-seva-name="<?php echo $seva->seva_name; ?>"  data-amount="<?php echo $seva->seva_amount; ?>" value="0" id="number<?php echo $key; ?>">
                            <button type="button" onclick="increment(<?php echo $key; ?>)">+</button>
                          </div>
                          <div class="Field-error"></div>
                          <div class="Field-description"></div>
                        </div>
                      </div>

                    </span>
                  </div>
                  <div class="Field-error"></div>
                  <div class="Field-description"></div>
                </div>
              </div>
              <?php } ?>
              <!---->
              <div>
                <div class="Field Field--amount Field--currency-1">
                  <div class="Field-label">Choice Amount


                    <div class="text-optional">(Optional)</div>
                  </div>
                  <div class="Field-content">
                    <div class="Field-wrapper"><span class="Field-addon Field-addon--before"><span slot="addonBefore">
                          <b class="currency-symbol">₹</b></span></span>
                      <input id="custom_amount" class=" form-control" type="number" placeholder="Enter Amount" value=""  >
                      <span class="Field-addon Field-addon--after"><span slot="addonAfter" style="color: red; font-size: 12px;"></span></span>
                    </div>
                    <div class="Field-error"></div>
                    <div class="Field-description"></div>
                  </div>
                </div>
              </div>

              <div class="row mt-3">
                      <div class="form-group col-md-6">
                        <label>Full Name<sup class="text-danger">*</sup></label>
                        <input id="full_name" type="text" name="full_name" value="" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Phone Number<sup class="text-danger">*</sup></label>
                        <input type="hidden" id="country_code" name="country_code" value="+91">
                        <input id="phone_number" type="text" name="phone_number" value="" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Email Id<sup class="text-danger">*</sup></label>
                        <input id="email" type="email" name="email" value="" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                      <label>Pan Number <small style="font-size: 11px">(Optional for 80G certificate)</small></label>
                        <input id="pan_number" type="text" name="pan_number"  onkeyup="this.value = this.value.toUpperCase()" value="" class="form-control">
                       
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="checkbox-group">
                                <div class="formbuilder-checkbox">
                                    <input name="address_check" access="false" id="address_check" value="yes" type="checkbox">
                                    <label for="80G-0" class="thm-color1"> I would like to receive Goodies/Best Wishes to my address</label>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row address_div">
                      <input name="address" type="hidden" value="NULL">
                      <input name="city" type="hidden" value="NULL">
                      <input name="pincode" type="hidden" value="NULL">

                    </div>
              <!---->
           
             
            </div>
            <!---->
            <div slot="after" class="mt-3 justify-content-center d-flex">
              <div id="form-footer " class="">



                <div class="form-footer-payment">

                  <button id="form-submit" type="submit" class="btn btn-flat btn-theme-colored mt-10 pl-30 pr-30 main-btn">Pay <span style="margin-left: 4px;">₹ <span class="pay-amount">0</span>.00</span></button>
                  <!---->
                </div>
              </div>
            </div>
          </form>
          <!---->
        </div>
      </div>
      <div class="col-lg-6 bg-white p-20 the-tech-right">
        <div class="the-tech-box">
          <div class="the-tech-item">
            
            <!-- <h5 class="widget-title line-bottom"><?php echo $page_items->festival_title; ?></h5> -->
                <?php echo $page_items->side_description; ?>
          </div>

        </div>
      </div>

      <div class="col-sm-12 my-3">
        <?php echo $page_items->bottom_description; ?>
      </div>
    </div>
  </div>
</section>
<button id="rzp-button1" class="d-none"></button>
<div id="failed-form"></div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  $('#address_check').on('click', function() {
        if ($(this).is(":checked")) {
         var html = '<div class="form-group col-md-12">'
             html +=  '<label>Address<sup class="text-danger">*</sup></label>'
             html +=   '<input id="address" type="text" name="address" value="" class="form-control" required>'
             html +=   '</div>'
           
             html +=   '<div class="form-group col-md-6">'
             html +=   '<label>City<sup class="text-danger">*</sup></label>'
             html +=   '<input id="city" type="text" name="city" value="" class="form-control">'
             html +=   '</div>'
             html +=   '<div class="form-group col-md-6">'
             html +=   '<label>PinCode<sup class="text-danger">*</sup></label>'
             html +=   '<input id="pincode" type="text" name="pincode" value="" class="form-control">'
             html +=   '</div>'
          
            $('.address_div').html(html)
        } else {
            html = '<input id="address" type="hidden" name="address" value="---" class="form-control">'
            $('.address_div').html(html) 
        }
    })

       var input = document.querySelector("#phone_number");
    window.intlTelInput(input,({
      // options here
      initialCountry: "in",
      autoPlaceholder: "polite",
      separateDialCode: true,
    }));
      var phone = $('#phone_number').val();
      if(phone == ''){
       var phone_number = '';
      }else{
         var phone_number = phone
      }
    $(document).ready(function() {
        // $('#phone_number').val("+91");
        $('.iti__flag-container').click(function() { 
          var countryCode = $('.iti__selected-flag').attr('title');
          var countryCode = countryCode.replace(/[^0-9]/g,'')
          // $('#phone_number').val("");
          // $('#phone_number').val("+"+countryCode+" "+ phone_number);
          $('#country_code').val("+"+countryCode);
       });
    });


$(document).ready(function(){

  $('#form-submit').on('click',function(){
      // console.log($( "input[seva-name]" ).length)
      var seva = $('input[seva-name]');
      // console.log(seva)
      var seva_array = [];
      $.each(seva, function(i, field) {
        if($(field).attr('seva-name')!=''){

          seva_array.push($(field).attr('seva-name'));
        }
        })
       
        $('#seva_name').val(seva_array);
    
        // var key = [$( "input[seva-name]" ).attr('seva-name')]
     
      // console.log(seva_array);
  })

  $('#custom_amount').on('keyup',function(){
    var amount = $(this).val();
    $('.counter-value').val(0);
    $('#amount').val(amount);
    $('.pay-amount').html(amount)
  })
  // $('#amount')
  $('#festival_form').validate({
    rules : {
    full_name:{
      required: true
    },
    email: {
      required : true,
      email : true
    },
    phone_number : {
      required : true, 
      digits: true,
      minlength : 10,
      maxlength : 12,
    },
    pan_number : {
      required : true
    },
  },
  messages : {
    full_name : {
      required : 'Name Field is mandatory',
    },
    email : {
      required : 'Email Field is Mandatory',
      email : 'Enter valid email address'
    },
    phone_number : {
      required : 'Phone Number is mandatory',
      digits : 'Numbers only allowed',
      minlength : 'Phone Number should be Minimum 10 digits ',
      maxlength : 'Phone Number should not exceed Maximum 12 digits '
    },
    pan_number : 'Pan Number field is mandatory',
  },
    submitHandler: function(form) {
      // e.preventDefault();  
      if($('#pay-amount').html() < 600 || $('#pay-amount').html() == '' ){
        alert('Minimum amount should be 600');
        return false;
      }
     
      $.ajax ({ 
        type : 'POST', 
        url : 'festivals/create_order', 
        data : $('#festival_form').serialize (),
        complete : function(data){
         
        console.log(data)
          var options = {
                  "key": data.responseJSON.keyId, // Enter the Key ID generated from the Dashboard
                  "amount": data.responseJSON.amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                  "currency": data.responseJSON.currency,
                  "name": data.responseJSON.company_name,
                  "description": data.responseJSON.company_description,
                  "image": data.responseJSON.LOGO_IMAGE,
                  "order_id": data.responseJSON.razorpay_order_id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                  "callback_url": data.responseJSON.callback_url,
                  // "redirect": true,
                  "retry" : {
                    'enabled':false,
                  },
                  "prefill": {
                      "name": data.responseJSON.full_name,
                      "email": data.responseJSON.email,
                      "contact": data.responseJSON.phone_number,
                      "pan_number": data.responseJSON.pan_number,
                      "address": data.responseJSON.address,
                  },
                  "notes": {
                      "address": data.responseJSON.address
                  },
                  "theme": {
                      "color": "#3399cc"
                  }
              };
              var rzp1 = new Razorpay(options);
              rzp1.on('payment.failed', function (response){
                  $('#failed-form').html('<form id="failed_form_submit" action="seva_page/donation_failed/'+data.responseJSON.insert_id+'" method="post" style="display:none"><input type="hidden" name="error_code" value="'+response.error.code+'"><input type="hidden" name="error_description" value="'+response.error.description+'"><input type="hidden" name="error_source" value="'+response.error.source+'"><input type="hidden" name="error_reason" value="'+response.error.reason+'"><input type="hidden" name="razorpay_order_id" value="'+response.error.metadata.order_id+'"><input type="hidden" name="razorpay_payment_id" value="'+response.error.metadata.payment_id+'"></form>');
                  $('#failed_form_submit').submit();
              });
             
              $('#rzp-button1').click(); 
              // $('#rzp-button1').on('click',function(e){
               
                rzp1.open();
                // e.preventDefault();
              // });
              // document.getElementById('rzp-button1').onclick = function(e){
              // }
        }
      })
    
  },
  });
  
})

  function increment(data){
   
    if($('#custom_amount').val() > 0){
      $('#amount').val('0');
    }
    $('#custom_amount').val('');
    $('.pay-amount').html('0');
    var count = $('#number'+data).val();
    var plushtml = $('#number'+data).attr('data-amount');
    var getamount = $('#amount').val();
    var amount = parseInt(getamount) + parseInt(plushtml);
    $('#amount').val(amount);
    $('.pay-amount').html(amount)
    var increment = parseInt(count)+1;
    $('#number'+data).val(increment);
    var seva_name = $('#number'+data).attr('data-seva-name');
    $('#number'+data).attr('seva-name',seva_name+'-'+increment+':'+amount);
  //  var seva =  $('#seva_name').val(function(index, oldVal){
  //     return oldVal + seva_name+',';
  //   })
  //   console.log(seva)
    $('#decrement'+data).removeAttr('disabled');
  }
  function decrement(data){
    if($('#custom_amount').val() > 0){
      $('#amount').val('0');
    }
    $('#custom_amount').val('');
    $('.pay-amount').html('0');
    var count = $('#number'+data).val();
    var plushtml = $('#number'+data).attr('data-amount');
    var getamount = $('#amount').val();
 
    var amount = parseInt(getamount) - parseInt(plushtml);
    $('#amount').val(amount);
    $('.pay-amount').html(amount)
    var decrement = parseInt(count)-1;

    $('#number'+data).val(decrement);
    var seva_name = $('#number'+data).attr('data-seva-name');
    $('#number'+data).attr('seva-name',seva_name+'-'+decrement+':'+amount)
  
    if(decrement == 0 && decrement < 1){
      $('#decrement'+data).attr('disabled',true);
      $('#number'+data).attr('seva-name','');
    }
  
 
  }

</script>