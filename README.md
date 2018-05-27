#Currency Task

### What has been done?

General summary of the solution

- `App/Model/Provider` directory has the general Provider structure
- Fewer inline comments (since I believe it is clean and readable as it is)
- Implement `App/Model/Provider/ProviderInterface` to create a new provider then you should add the said provider to the services.yml (if  you don't, you need to initialize and use in your operator yourself)
- The query in `App/Repositories/ExchangeRepository` is analyzed and gives the best performance among the solutions (Get the most recent ratios for a provider and find the mins in the said providers)
- `fetch` route is provided for using without going to console.


### What I would do?

What I would do if it was provided in the task

- I would add an AuthenticatorInterface as a dependency to pass to the providers. Noted in @TODO
- If the providers were defined stricter, for example only json or xml data, I would add the providers with their definitions to the DB. But with the current definitions this would take away our freedom to operate.
  - Provider: id, name, endpoint, definition_id
  - Definition: symbol_path (result.symbol), euro_symbol, dollar_symbol, gbp_symbol, amount_path
  
  
 _PS:I will gladly answer any further questions about the process and whys of the solution_