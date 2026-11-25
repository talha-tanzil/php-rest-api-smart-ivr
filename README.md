# Smart IVR API Integration (PHP)

A simple PHP project demonstrating integration with the Smart IVR API using cURL. This project allows a request to be sent to the Smart IVR API with a recipient's mobile number to trigger an SMS notification.

## Features

- Integration with the Smart IVR API
- API requests using PHP cURL
- Sending a recipient's mobile number to the API
- Mobile number format validation for Bangladeshi numbers
- Support for the following mobile number formats:
  - `01XXXXXXXXX`
  - `8801XXXXXXXXX`
  - `+8801XXXXXXXXX`
- API response handling using JSON
- Basic request and response handling

## Technologies Used

- PHP
- cURL
- JSON
- Smart IVR API

## Supported Mobile Number Formats

The project validates Bangladeshi mobile numbers in the following formats:

| Format | Example |
|---|---|
| Local format | `01712345678` |
| Country code | `8801712345678` |
| International format | `+8801712345678` |

Only mobile numbers with valid Bangladeshi operator prefixes (013–019) are accepted.

## How It Works

1. A mobile number is provided as input.
2. PHP validates the number against the supported Bangladeshi mobile number formats.
3. If the number is valid, a request is sent to the Smart IVR API using cURL.
4. The API processes the request and triggers the SMS notification.
5. The API response is received and handled by the PHP application.

## Requirements

- PHP installed on the local/server environment
- PHP cURL extension enabled
- Smart IVR API access and required credentials


## Disclaimer

This project is intended for learning and demonstrating API integration with PHP. SMS delivery and API responses depend on the Smart IVR service and its availability.
