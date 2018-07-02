@extends('layouts.deudas') @section('title','Lista de deudores') @section('content')

<link rel="stylesheet" type="text/css" href="https://docs.handsontable.com/pro/bower_components/handsontable-pro/dist/handsontable.full.min.css">
<link rel="stylesheet" type="text/css" href="https://handsontable.com/static/css/main.css">
<script src="https://docs.handsontable.com/pro/bower_components/handsontable-pro/dist/handsontable.full.min.js"></script>

<div class="row">

    <div id="hot"></div>


</div>

<script>
    var dataObject = [
  {
    id: 1,
    flag: 'EUR',
    currencyCode: 'EUR',
    currency: 'Euro',
    level: 0.9033,
    units: 'EUR / USD',
    asOf: '08/19/2018',
    onedChng: 0.0026
  },
  {
    id: 2,
    flag: 'JPY',
    currencyCode: 'JPY',
    currency: 'Japanese Yen',
    level: 124.3870,
    units: 'JPY / USD',
    asOf: '08/19/2018',
    onedChng: 0.0001
  },
  {
    id: 3,
    flag: 'GBP',
    currencyCode: 'GBP',
    currency: 'Pound Sterling',
    level: 0.6396,
    units: 'GBP / USD',
    asOf: '08/19/2018',
    onedChng: 0.00
  },
  {
    id: 4,
    flag: 'CHF',
    currencyCode: 'CHF',
    currency: 'Swiss Franc',
    level: 0.9775,
    units: 'CHF / USD',
    asOf: '08/19/2018',
    onedChng: 0.0008
  },
  {
    id: 5,
    flag: 'CAD',
    currencyCode: 'CAD',
    currency: 'Canadian Dollar',
    level: 1.3097,
    units: 'CAD / USD',
    asOf: '08/19/2018',
    onedChng: -0.0005
  },
  {
    id: 6,
    flag: 'AUD',
    currencyCode: 'AUD',
    currency: 'Australian Dollar',
    level: 1.3589,
    units: 'AUD / USD',
    asOf: '08/19/2018',
    onedChng: 0.0020
  },
  {
    id: 7,
    flag: 'NZD',
    currencyCode: 'NZD',
    currency: 'New Zealand Dollar',
    level: 1.5218,
    units: 'NZD / USD',
    asOf: '08/19/2018',
    onedChng: -0.0036
  },
  {
    id: 8,
    flag: 'SEK',
    currencyCode: 'SEK',
    currency: 'Swedish Krona',
    level: 8.5280,
    units: 'SEK / USD',
    asOf: '08/19/2018',
    onedChng: 0.0016
  }
];
var currencyCodes = ['EUR', 'JPY', 'GBP', 'CHF', 'CAD', 'AUD', 'NZD', 'SEK', 'NOK', 'BRL', 'CNY', 'RUB', 'INR', 'TRY', 'THB', 'IDR', 'MYR', 'MXN', 'ARS', 'DKK', 'ILS', 'PHP'];
var flagRenderer = function (instance, td, row, col, prop, value, cellProperties) {
  var currencyCode = value;
  while (td.firstChild) {
    td.removeChild(td.firstChild);
  }
  if (currencyCodes.indexOf(currencyCode) > -1) {
    var flagElement = document.createElement('DIV');
    flagElement.className = 'flag ' + currencyCode.toLowerCase();
    td.appendChild(flagElement);
  } else {
    var textNode = document.createTextNode(value === null ? '' : value);

    td.appendChild(textNode);
  }
};
var hotElement = document.querySelector('#hot');
var hotElementContainer = hotElement.parentNode;
var hotSettings = {
  data: dataObject,
  columns: [
    {
      data: 'id',
      type: 'numeric',
      width: 40
    },
    {
      data: 'flag',
			renderer: flagRenderer
    },
    {
      data: 'currencyCode',
      type: 'text'
    },
    {
      data: 'currency',
      type: 'text'
    },
    {
      data: 'level',
      type: 'numeric',
      numericFormat: {
        pattern: '0.0000'
      }
    },
    {
      data: 'units',
      type: 'text'
    },
    {
      data: 'asOf',
      type: 'date',
      dateFormat: 'MM/DD/YYYY'
    },
    {
      data: 'onedChng',
      type: 'numeric',
      numericFormat: {
        pattern: '0.00%'
      }
    }
  ],
  stretchH: 'all',
  width: 806,
  autoWrapRow: true,
  height: 487,
  maxRows: 22,
  manualRowResize: true,
  manualColumnResize: true,
  rowHeaders: true,
  colHeaders: [
    'ID',
    'Country',
    'Code',
    'Currency',
    'Level',
    'Units',
    'Date',
    'Change'
  ],
  manualRowMove: true,
  manualColumnMove: true,
  contextMenu: true,
  filters: true,
  dropdownMenu: true,
};
var hot = new Handsontable(hotElement, hotSettings);
</script>
@endsection