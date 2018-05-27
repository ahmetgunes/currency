# Currency Task

### What has been done?

General summary of the solution

- `App/Model/Provider` directory has the general Provider structure
- Fewer inline comments (since I believe it is clean and readable as it is)
- Implement `App/Model/Provider/ProviderInterface` to create a new provider then you should add the said provider to the services.yml (if  you don't, you need to initialize and use in your operator yourself)
- The query in `App/Repositories/ExchangeRepository` is analyzed and gives the best performance among the solutions (Get the most recent ratios for a provider and find the minimums in the said providers)
- `fetch` route is provided for using without going to console.
- Run `php bin/console fetch:exchange` to fetch ratios from CLI
- I use my own `DBTimeTrait` instead of Doctrine's `TimeStampable` . Why?
  - I don't want to import an unnecessary bundle
  - Doctrine's own `TimeStampable` does not provide definitions like `TIMESTAMP ON UPDATE NOW()` . Much more detailed info would be shared upon request (since this decision has more insights). 


### What I would do?

What I would do if it was provided in the task

- I would add an AuthenticatorInterface as a dependency to pass to the providers or an authentication proxy (depending on the authentication definitions). Noted in @TODO
- If the providers were defined stricter, for example only json or xml data, I would add the providers with their definitions to the DB. This way we could add a provider or a new currency much much easier. Why? Because we could give the paths to reach actual data, we could give a definition of new currency and separate the currencies from exchange table. Also we could have made a BuilderInterface which converts the response to an Exchange entity. This way we could separate and sometimes reuse the definitions with different providers. But with the current definitions this would take away our freedom to operate.
- Providers might have more meta info like it's name and such in DB  
  
 _PS:I will gladly answer any further questions about the process and whys of the solution_