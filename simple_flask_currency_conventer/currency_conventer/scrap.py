import pandas as pd


class DataScrap():

    def __init__(self):
        self.tables = pd.read_html('https://mybank.pl/kursy-walut/')

    def get_data(self) -> dict:
        """Scraps the data from the link below and returns a dictionary with
    KeyValuePairs {Currency:Value}
    """
        df = self.tables[0]  # only first table
        df = df[['Nazwa waluty', 'Kurs']]  # Only necessary columns
        df = df.drop([11, 24])  # drop faulty rows
        df['Kurs'] = pd.to_numeric(df['Kurs'])  # convert rate to numeric
        df['Kurs'] = df['Kurs'] / 10000  # fix prices
        names = list(df['Nazwa waluty'])
        prices = list(df['Kurs'])
        currencies = {}
        for i in range(0, len(names)):
            currencies[names[i]] = prices[i]
        return currencies


if __name__ == '__main__':
    s = DataScrap()
    data = s.get_data()
    print(data)
