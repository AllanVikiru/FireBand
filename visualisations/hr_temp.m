%% define channel ID, API key and data fields
readChannelID = 0000000;
readAPIKey = 'RSE5CUZBM5OPTYBS';
hrField = 2;
tempField = 3;

%% fetch 250 temperature and relative humidity data points
data = thingSpeakRead(readChannelID,'Fields',[hrField,tempField], 'NumPoints', 250, 'ReadKey',readAPIKey); 

%% standardise and fill missing data using linear interpolation: fill using previous and next linearly fitting data
sthrData = standardizeMissing(data(:, 1), 0);
sttempData = standardizeMissing(data(:, 2), 0);
flhrData = fillmissing(sthrData,'linear');
fltempData = fillmissing(sttempData,'linear');

%% define scatter plot with preprocessed data
scatter(flhrData,fltempData);
xlabel('Heartrate (bpm)');
ylabel('Temperature (°C)');
legend('Data Points');
grid on;