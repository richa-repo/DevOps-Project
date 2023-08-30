# Use a base image
FROM nginx:alpine

# Copy your website files to the appropriate location
COPY C:\xampp\htdocs\food-order /usr/share/nginx/html

# Expose the port that your web server will use
EXPOSE 80

# Start the web server
CMD ["nginx", "-g", "daemon off;"]
