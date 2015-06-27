##Design Pattern Examples

There are several patterns included:

 - Chain of Responsibility
 - Dependency Injection (also showing elimination of singletons)
 - Factory

Over time, I would like to add more to this list.

###Tests:

    cd CoR/
    php ../vendor/phpunit/phpunit/phpunit --configuration=../phpunit.xml --exclude-group=invalid  ./

You can include the `--exclude-group=invalid` to prevent breaking tests from running.

###Credits:

I am grateful for the following resources:
 - The book, Design Patterns
 - http://designpatternsphp.readthedocs.org/en/latest/README.html