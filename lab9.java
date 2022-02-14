package com.amazonaws.samples;

import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.List;
import java.sql.Connection;

import com.amazonaws.regions.Regions;
import com.amazonaws.services.rds.AmazonRDS;
import com.amazonaws.services.rds.AmazonRDSClientBuilder;
import com.amazonaws.services.rds.model.DBInstance;
import com.amazonaws.services.rds.model.DescribeDBInstancesResult;

public class lab9 {

public static void main(String[] args) {
// TODO Auto-generated method stub
AmazonRDS awsRDS = AmazonRDSClientBuilder.standard().withRegion(Regions.US_EAST_1).build();
DescribeDBInstancesResult dbResult= awsRDS.describeDBInstances();
List<DBInstance> dbInstance = dbResult.getDBInstances();
for(DBInstance dbInst:dbInstance)
{
System.out.println("DBInstance:" +dbInst.getDBName());
}
String hostname= "lab99.chcj1cdw1go0.ap-south-1.rds.amazonaws.com";
String Port = "3306";
String jdbc_url = "jdbc:mysql:// "+hostname+":"+Port+"/lab9";
try {
Connection con = (Connection) DriverManager.getConnection(jdbc_url ,"admin","ranipanda123");
Statement stmt = con.createStatement();
ResultSet rs = stmt.executeQuery("select * from student");
while(rs.next()) {
System.out.println(rs.getString("id"));
System.out.println(rs.getString("name"));
}
}
catch(SQLException e) {
e.printStackTrace();

}
}



}