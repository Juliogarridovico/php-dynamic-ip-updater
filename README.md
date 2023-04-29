# PHP IP Address Checker

This script checks if your IP address has changed and updates it accordingly.

## Variables

- `$urls`: An array containing two text strings representing the API endpoints to fetch the IP address.
- `$UserName`, `$ApiKey`, `$UrlEndPoint`: Configuration variables for the update system endpoint.
- `$success_msgs`, `$error_msgs`: Arrays to store success and error messages.
- `$count`, `$random`: Variables to obtain a random position in the `$urls` array.
- `$ipaddress`: The fetched IP address from the selected API endpoint.
- `$time`: The current time in ISO 8601 format.
- `$file`, `$current`, `$existing_data`: Variables related to reading and decoding the JSON file content.
- `$last_ip`, `$last_update`: The last published IP address and the update date.
- `$data`: An array to store the new data to be added to the existing data.
- `$json`: The entire data array in JSON format.
- `$last_update_date`, `$current_date`, `$days_diff`: Variables to calculate the number of days since the last update.

## How it works

1. The script fetches the IP address from a randomly chosen API endpoint.
2. It reads the existing JSON file and decodes its content.
3. It compares the last published IP address with the current IP address.
4. If the IP addresses are different, the script updates the dynamic IP address using the cdmon website.
5. The new data (URL, time, IP address, and last update) are added to the existing array.
6. The entire array is converted to JSON format and the JSON file is updated.
7. The script calculates the number of days since the last update.
8. It displays success and error messages, as well as the last update and current IP address on a simple webpage using Bootstrap for styling.
