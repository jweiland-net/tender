# TYPO3 Extension `tender`

![Build Status](https://github.com/jweiland-net/tender/workflows/CI/badge.svg)

Tender is an extension for TYPO3 CMS. It shows you a list of tender entries incl.
detail view.

Currently tender needs a mandatory relation to our TYPO3 extension service_bw2.

## 1 Features

* Tender brings you the functionality to provide your visitors a list of available tenders.
* Each tender can be individualized with different data like a description, downloads, a department and more.
* If you want set a timeframe in which your tender is available you can use a start and end date.
* Displaying tenders can be done with categories, this gives you more flexibility to provide designated tenders.

## 2 Usage

### 2.1 Installation

#### Installation using Composer

The recommended way to install the extension is using Composer.

Run the following command within your Composer based TYPO3 project:

```
composer require jweiland/tender
```

#### Installation as extension from TYPO3 Extension Repository (TER)

Download and install `tender` with the extension manager module.

### 2.2 Minimal setup

1) Include the static TypoScript of the extension.
2) Create tender records on a sysfolder.
3) Create a plugin on a page and select at least the sysfolder as startingpoint.
