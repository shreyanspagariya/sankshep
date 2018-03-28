#include<bits/stdc++.h>
using namespace std;

int myatoi(string s)
{
    int x = 0,i;
    for(i=0;i<s.length();i++)
    {
        x = 10*x + s[i]-'0';
    }
    return(x);
}

string remove_special(string s)
{
    int i;
    string t;
    for(i=0;i<s.length();i++)
    {
        if(s[i] >= 'A' && s[i] <= 'Z')
        {
            char c = s[i] - 'A' + 'a';
            t = t + c;
        }
        else if(s[i] >= 'a' && s[i] <= 'z')
        {
            t = t + s[i];
        }
    }
    return(t);
}

vector<string> v;

vector<pair<string,pair<string,pair<string,pair<string,string> > > > > u;
map<pair<string,pair<string,pair<string,pair<string,string> > > >,int> mp;
vector<pair<int,int> > w;

map<string,int> stopwords;

int main(int argc, char *argv[])
{
    string s;
    int next = 0,i,j;

    std::ifstream in2("stopwords.txt");
    std::streambuf *cinbuf2 = std::cin.rdbuf();
    std::cin.rdbuf(in2.rdbuf());

    while(cin>>s)
    {
        int y = myatoi(s);
        string tt = remove_special(s);
        stopwords[tt] = 1;
    }

    std::ifstream in(argv[1]);
    std::streambuf *cinbuf = std::cin.rdbuf();
    std::cin.rdbuf(in.rdbuf());

    std::ofstream out(argv[2]);
    std::streambuf *coutbuf = std::cout.rdbuf();
    std::cout.rdbuf(out.rdbuf());

    while(cin>>s)
    {
        int y = myatoi(s);
        string tt = remove_special(s);
        if(tt.length() > 0 && tt[0] != ' ' && !stopwords.count(tt))
        {
            v.push_back(tt);
        }
    }
    pair<string,pair<string,pair<string,pair<string,string> > > > temp;
    for(i=0;i<v.size();i++)
    {
        temp.first = v[i];
        temp.second.first = "a";
        temp.second.second.first = "a";
        temp.second.second.second.first = "a";
        temp.second.second.second.second = "a";

        if(mp.count(temp) == 0)
        {
            mp[temp] = 1;
            u.push_back(temp);
        }
        else
        {
            mp[temp]++;
        }

        if(i+1 < v.size())
        {
            temp.first = v[i];
            temp.second.first = v[i+1];
            temp.second.second.first = "a";
            temp.second.second.second.first = "a";
            temp.second.second.second.second = "a";

            if(mp.count(temp) == 0)
            {
                mp[temp] = 1;
                u.push_back(temp);
            }
            else
            {
                mp[temp]++;
            }
        }

    }
    for(i=0;i<u.size();i++)
    {
        w.push_back(make_pair(mp[u[i]],i));
    }
    sort(w.begin(),w.end());
    map<string,int> istaken;
    cout<<"<ul>\n";
    for(i=w.size()-1;i>=0;i--)
    {
        if(w[i].first > 1 && u[w[i].second].second.first != "a")
        {
            istaken[u[w[i].second].second.first] = istaken[u[w[i].second].first] = 1;
            u[w[i].second].first[0] += 'A'-'a';
            cout<<"<li>"<<u[w[i].second].first<<" "<<u[w[i].second].second.first<<"</li>\n";
        }
    }
    for(i=w.size()-1;i>=0;i--)
    {
        if(w[i].first > 1 && !istaken.count(u[w[i].second].first) && u[w[i].second].second.first == "a")
        {
            u[w[i].second].first[0] += 'A'-'a';
            cout<<"<li>"<<u[w[i].second].first<<"</li>\n";
        }
    }
    cout<<"</ul>\n";
    in2.close();
    in.close();
    out.close();
    return(0);
}
