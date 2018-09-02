Username=admin
Password=password

Database stock.sql is included inside this folder. (Phoneshop/shop.sql)

Modifications
Sessions are created. Now you will have to login again when entering an incognito window.
There are four buttons in the index page which are named as Items, Stock, Invoice and Report respectively.

Item--> You can see the detailed table of the items that we have in the stock.
	New items can be added, current items can be edited and deleted. You will be asked to fill all the fields.
	The items which have the same name will update itself without any redundancy.

Stock--> A summarized table is viewed including the name and quantity of the goods.
	 There is another function(button) named Add Stock which we can use to add new goods to the stock table. 
	 You can update the existing stock by clicking select and entering the quantity. The quantity itself will be 
	 increased without any redundancies. You will be asked to fill all the fields.

Invoice--> You can issue an invoice containing Customer name, ItemName, price and Quantity by clicking select on the items
	   which the stock has and clicking Generate Invoice.
	   After an issue, the stock will automatically decreased.
	   Ex: If a customer purchased 2 out of 5 goods you had in the stock, it will be now shown as 3.
	
	   If the stock is over, an "Out of stock" message will be shown.
Report--> A detailed list of customers and their purchase details can be generated in a window.