%% define channel ID, API key and data fields
readChannelID = 0000000;
readAPIKey = '';
tempField = 3;
humField = 4;

%% fetch 250 temperature and relative humidity data points
data = thingSpeakRead(readChannelID,'Fields',[tempField,humField], 'NumPoints', 250, 'ReadKey',readAPIKey); 

%% standardise and fill missing data using linear interpolation: fill using previous and next linearly fitting data
sttempData = standardizeMissing(data(:, 1), 0);
sthumData = standardizeMissing(data(:, 2), 0);
fltempData = fillmissing(sttempData,'linear');
flhumData = fillmissing(sthumData,'linear');

%% fit first degree polynomial and evaluate the fitted values in the temperature data
m = polyfit(fltempData,flhumData,1);
f = polyval(m,fltempData); 

%% plot data points and linear regression model
plot(fltempData,flhumData,'o', fltempData,f,'-');
xlabel('Temperature (°C)');
ylabel('Relative Humidity (%)');
legend('Data Points','Line of Best Fit');
grid on;