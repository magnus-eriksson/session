# A dead simple session library in PHP

[![Build Status](https://api.travis-ci.org/magnus-eriksson/session.svg)](https://travis-ci.org/magnus-eriksson/session)


Manage PHP sessions and flash sessions in a simple way.

## Install

Clone this repository or use composer to download the library with the following command:
```
composer require maer/session 1.*
```

## Set up

Load the library via composers autoloader:

```
include '/path/to/vendor/autoload.php';
```

Load the library manually:

```
include '/path/to/library/src/SessionInterface.php';
include '/path/to/library/src/Session.php';
```

## Example
When a session instance is created, it will check if the session already is started. If not, it will start it using `session_start()`.

### Managing sessions

```
$session = new Maer\Session\Session();

// Set a value
$session->set('my-key', 'my-value');

// Get a value
$value = $session->get('my-key');

// Add an optional second argument
$value = $session->get('non-existint-key', 'this-will-be-returned');

// Check if a key exists
if ($session->has('my-key')) {
    // Yay... it exists!
} else {
   // Darn! It didn't exist!
}

// Forget/clear/remove a session key
$session->forget('my-key');

// Forget/clear/remove all session keys and destroy the session cookie
$session->destroy();
```

### Flash sessions

A flash session is a "one-request-only"-session. If you set a flash session, it is only accessable in the next request and will then be removed. It's perfect for things like success/status/error messages.

```
// Set a flash session
$session->setFlash('error', 'This is an error message');

// On the next request
$value = $session->getFlash('error');

// Add an optional second argument
$value = $session->get('non-existint-key', 'this-will-be-returned');

```

Both `->get(...)` and `->getFlash(...)` returns `NULL` as default if the key isn't found.


---
I told you it was dead simple!

If you have any questions, suggestions or issues, let me know!

Happy coding!